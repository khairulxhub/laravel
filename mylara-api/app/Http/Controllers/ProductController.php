<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // $products = Product::from('products as p')
        // ->join('categories as c', 'c.id', '=', 'p.category_id')
        // ->join('brands as b', 'b.id', '=', 'p.brand_id')
        // ->select('p.*', 'c.name as category_name', 'b.name as brand_name')
        // ->get()
        // ;
       
        // if($request->search && $request->category_id && $request->brand_id){ {
        //     dd($request->search . " " . $request->category_id . " ". $request->brand_id);
        // }
        // }

        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');


        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }
        $products = $query->with('category', 'brand')
        ->orderby('id', 'desc')
        ->paginate();


       $categories = Category::orderBy('name', 'asc')->get();
       $brands = Brand::orderBy('name', 'asc')->get();


        // $products = Product::with('category','brand')
        // ->orderby('id', 'desc')
        // ->paginate();

        return view('admin.pages.product.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderby('name', 'asc')->get();
        $brands = Brand::orderBy('name', 'asc')->get();

        // dd($brands);
        // dd($categories);
        return view('admin.pages.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'reorder_level' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'active' => $request->has('active') ? 1 : 0,
        'reorder_level' => $request->reorder_level,
    ];

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move(
            public_path('uploads/products'),
            $imageName
        );

        $data['image'] = 'uploads/products/' . $imageName;
    }

    Product::create($data);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // dd($product->image);
        if($product->image){
            unlink(public_path($product->image));
        }
        Product::destroy($product->id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
