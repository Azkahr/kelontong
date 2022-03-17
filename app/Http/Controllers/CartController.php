<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{   
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

                    return response()->json([
                        'status' => $product->product_name . " berhasil ditambahkan ke keranjang",
                    ]);
                }
            }
        } else {
            return response()->json(['status' => "Login terlebih dahulu"]);
        }
    }

    public function update(Request $request){

        if(!$request->ajax()){
            return redirect('/');
        }

        $products_id = $request->products_id;
        $qty = $request->qty;

        $update = Cart::where('products_id', $products_id)->where('users_id', Auth::user()->id)->first();
        $update->qty = $qty;
        $update->update();
        
        $data = $update->products->harga;

        if($update){
            return response()->json([
                'status' => 'Berhasil',
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'status' => 'Gagal',
            ]);
        }
    }


    public function delete(Request $request){

        $products_id = $request->input('products_id');

        if(Cart::where('products_id', $products_id)->where('users_id', Auth::id())->exists()){

            $cart = Cart::where('products_id', $products_id)->where('users_id', Auth::id())->first();
            $data = $cart->qty * $cart->products->harga;
            $cart->delete();
            
            return response()->json([
                'status' => "Berhasil dihapus",
                'data' => $data
            ]);
        } else {
            return response()->json(['status' => "Gagal dihapus"]);
        }
    }
}
