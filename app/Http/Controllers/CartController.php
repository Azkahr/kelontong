<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(){

        $carts = Cart::where('users_id', Auth::id())->get();
        return view('cart', [
            "title" => "Cart",
            "carts" => $carts
        ]);
    }
    
    public function addToCart(Request $request){
        
        $products_id = $request->input('products_id');
        $products_qty = $request->input('products_qty');

        if(Auth::check()){

            $product = Product::where('id', $products_id)->first();

            if($product){
                
                if(Cart::where('id', $products_id)->where('users_id', Auth::id())->exists()){

                    return response()->json(['status' => $product->product_name . " sudah ada di keranjang"]);
                    
                } else {
                
                    $cart = new Cart();
                    $cart->products_id = $products_id;
                    $cart->users_id = Auth::id();
                    $cart->qty = $products_qty;
                    $cart->save();

                    return response()->json(['status' => $product->product_name . " berhasil ditambahkan ke keranjang"]);
                }
            }
        } else {
            return response()->json(['status' => "Login terlebih dahulu"]);
        }
    }

    public function update(Request $request){
        
        $products_id = $request->input('products_id');
        $qty = $request->input('qty');

        if(Auth::check()){

            if(Cart::where('products_id', $products_id)->where('users_id', Auth::id())->exists()){

                $cart = Cart::where('products_id', $products_id)->where('users_id', Auth::id())->first();
                $cart->qty = $qty;
                $cart->update();

                return response()->json(['status' => "Berhasil update keranjang"]);
            }
        } else {
            return response()->json(['status' => "Login terlebih dahulu"]);
        }
    }   

    public function delete(Request $request){

        $products_id = $request->input('products_id');

        if(Cart::where('products_id', $products_id)->where('users_id', Auth::id())->exists()){

            $cart = Cart::where('products_id', $products_id)->where('users_id', Auth::id());

            $cart->delete();
            
            return response()->json(['status' => "Berhasil dihapus"]);
        } else {
            return response()->json(['status' => "Gagal dihapus"]);
        }
    }
}
