<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{
    public function index()
    {
        $products = Cart::all();
    
        return view('cart', compact('products'));
    }
    


    public function store(Request $request)
    {
       $cart = new Cart([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity'=> $request->quantity,
            'size' => $request->size,
            'product_id' => $request->product_id,
            'image' => $request->image,        
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'images/images';
            $profileImage = uniqid() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $cart->image ='images/'. $profileImage;
        }
        $cart->save();
        return redirect()->route('cart.index');
    }

    public function edit(Request $request, $id)
    {
        $product = Cart::find($id);
        if (!$product) {
            abort(404);
        }
        $product->quantity = $request->input('quantity');
        $product->size = $request->input('size');
        $product->save();
       

        return redirect()->route('cart.index');
    }

    

    public function destroy($id)
    {
    $product = Cart::find($id);
    if ($product) {
        Storage::delete('public/' . $product->image);
        $product->delete();
    }
    return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        DB::table('carts')->delete();
 
        return redirect()->route('cart.index');
    }
    public function sumPrice(){

  $sum =

    DB::table('carts')->sum('price');

    return view('cart', compact('sum'));


}
}

