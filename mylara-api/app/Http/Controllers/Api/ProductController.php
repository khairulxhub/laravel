<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\UploadImgService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * List products with search, filter and pagination.
     *
     * GET /api/products?search=&category_id=&brand_id=&active=&per_page=&sort=&direction=
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'active' => 'nullable|boolean',
            'per_page' => 'nullable|integer|min:1|max:100',
            'sort' => ['nullable', Rule::in(['id', 'name', 'price', 'quantity', 'created_at'])],
            'direction' => ['nullable', Rule::in(['asc', 'desc'])],
        ]);

        $products = Product::query()
            ->with(['category:id,name', 'brand:id,name'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%');
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->when($request->filled('brand_id'), function ($query) use ($request) {
                $query->where('brand_id', $request->brand_id);
            })
            ->when($request->filled('active'), function ($query) use ($request) {
                $query->where('active', $request->boolean('active'));
            })
            ->orderBy($request->input('sort', 'id'), $request->input('direction', 'desc'))
            ->paginate();

        return response()->json([
            'products' => $products,
            'meta' => [
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
                'last_page' => $products->lastPage(),
            ],
        ]);
    }

    /**
     * Categories and brands for the filter / create form.
     *
     * GET /api/products/filters
     */
    public function filters()
    {
        return response()->json([
            'categories' => Category::orderBy('name')->get(['id', 'name']),
            'brands' => Brand::orderBy('name')->get(['id', 'name']),
        ]);
    }

    /**
     * Store a new product.
     *
     * POST /api/products (multipart/form-data when an image is uploaded)
     */
    public function store(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     return response()->json('Image found');
        // } else {
        //     return response()->json('Image not found');
        // }
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'reorder_level' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'image|mimes:jpeg,png,jpg|max:500',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = UploadImgService::upload($request->image, 'uploads/products');
        }

        $validated['active'] = $request->boolean('active');

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'product' => $product->load('category', 'brand'),
        ], 201);
    }

    /**
     * Show a single product.
     *
     * GET /api/products/{product}
     */
    public function show(Product $product)
    {
        return response()->json([
            'product' => $product->load(['category:id,name', 'brand:id,name']),
        ]);
    }

    /**
     * Update a product.
     *
     * PUT/PATCH /api/products/{product}
     */
    public function update(Request $request, Product $product)
    {
        $request->validate($this->rules($product->id));

        $data = $this->payload($request, $product);

        if ($request->hasFile('image')) {
            $this->deleteImage($product);
        }

        $product->update($data);

        return response()->json([
            'success' => 'true',
            'message' => 'Product updated successfully',
            'product' => $product->fresh()->load(['category:id,name', 'brand:id,name']),
        ]);
    }

    /**
     * Delete a product.
     *
     * DELETE /api/products/{product}
     */
    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();

        return response()->json([
            'success' => 'true',
            'message' => 'Product deleted successfully',
        ]);
    }

    private function rules(?int $id = null): array
    {
        $required = $id ? 'sometimes|required' : 'required';

        return [
            'name' => $required.'|string|max:255',
            'category_id' => $required.'|integer|exists:categories,id',
            'brand_id' => $required.'|integer|exists:brands,id',
            'description' => $required.'|string',
            'price' => $required.'|numeric|min:0',
            'quantity' => $required.'|integer|min:0',
            'reorder_level' => $required.'|integer|min:0',
            'active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    private function payload(Request $request, ?Product $product = null): array
    {
        $data = $request->only([
            'name',
            'category_id',
            'brand_id',
            'description',
            'price',
            'quantity',
            'reorder_level',
        ]);

        if ($request->has('active')) {
            $data['active'] = $request->boolean('active');
        } elseif (! $product) {
            $data['active'] = 1;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);

            $data['image'] = 'uploads/products/'.$imageName;
        }

        return $data;
    }

    private function deleteImage(Product $product): void
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
    }
}
