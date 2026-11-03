<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mobiles = $this->latestProduct(1);
        $watch = $this->latestProduct(2);
        $accessories = $this->latestProduct(3);
        $speakers = $this->latestProduct(4);
         $cameras = $this->latestProduct(5);
        return view('site.pages.home', compact('mobiles', 'watch', 'accessories', 'cameras', 'speakers'));
    }

    public function latestProduct($_category_id)
    {
        $products = Product::select('id', 'name', 'price', 'image','quantity')
        ->where('category_id', $_category_id)
        ->where('active', 1)
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();
        return $products;
    }


    public function details($id)
    {
        $products = Product::findOrFail($id);
        return view('site.pages.product-details' , compact('products'));
    }
    public function cart()
    {
        return view('site.pages.cart');
    }
}
