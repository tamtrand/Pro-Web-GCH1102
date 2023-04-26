<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
    return view('admin.create', compact('categories'));
    }
    public function store(ProductRequest $request)
{
    $input = $request->all();
    if ($image = $request->file('image')) {
        $destinationPath = 'images/images';
        $profileImage = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['image'] = 'images/images' . $profileImage;
    }
    $product = new Product([
        'name' => $input['name'],
        'description' => $input['description'],
        'price' => $input['price'],
        'category_id' => $input['category_id'],
        'image' => 'images/' . $profileImage
    ]);
    $product->save();
    return redirect()->route('admin.index');
}
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if ($product->image) {
            Storage::delete($product->image);
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'images/images';
            $profileImage = uniqid() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $product->image ='images/'. $profileImage;
        }
        
        $product->save();
        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {
    $product = Product::find($id);
    if ($product) {
        Storage::delete('public/' . $product->image);
        $product->delete();
    }
    return redirect()->route('admin.index');
    }
}