<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }
    public function showShirts()
    {
        $products = Product::where('category_id', 1)->get();
        return view('shirts', compact('products'));
    }
    public function showPants()
    {
        $products = Product::where('category_id', 2)->get();
        return view('pants', compact('products'));
    }
    public function showAccessories()
    {
        $products = Product::where('category_id', 3)->get();
        return view('accessories', compact('products'));
    }
    public function showShoes()
    {
        $products = Product::where('category_id', 4)->get();
        return view('shoes', compact('products'));
    }
}
