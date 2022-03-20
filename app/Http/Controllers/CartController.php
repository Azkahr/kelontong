<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{   
    public function addToCart(Request $request){
        
        if(Auth::check()){

            $products_id = $request->input('products_id');
            $qty = $request->input('products_qty');

            if(Cart::where('users_id', Auth::id())->where('products_id', $products_id)->exists()){
                return response()->json(['status' =>"Produk Sudah Ada Di Keranjang"]);
            } else {
            
                $insert = Cart::create([
                    'users_id' => Auth::user()->id,
                    'products_id' => $products_id,
                    'qty' => $qty,
                ]);

                if($insert){
                    return response()->json([
                        'status' => "Produk Berhasil Ditambahkan Ke Keranjang",
                    ]);
                }else{
                    return response()->json([
                        'status' => "Produk Gagal Ditambahkan Ke Keranjang",
                    ]);
                }
            }
        } else {
            return response()->json(['status' => "Login Terlebih Dahulu"]);
        }
    }

    public function update(Request $request){

        if(!$request->ajax()){
            return redirect('/');
        }

        $products_id = $request->input('products_id');
        $qty = $request->input('qty');

        $update = Cart::where('users_id', Auth::user()->id)->where('products_id', $products_id)->first();
        $update->qty = $qty;
        $update->update();

        if($update){
            return response()->json([
                'status' => 'Berhasil Diupdate'
            ]);
        }else{
            return response()->json([
                'status' => 'Gagal Diupdate'
            ]);
        }
    }


    public function delete(Request $request){

        if(!$request->ajax()){
            return redirect('/');
        }

        $products_id = $request->input('products_id');

        $cart = Cart::where('products_id', $products_id)->where('users_id', Auth::id())->first();
        $cart->delete();
        
        if ($cart) {
            return response()->json([
                'status' => "Berhasil Dihapus",
            ]);
        }else{
            return response()->json(['status' => "Gagal Dihapus"]);
        }
    }
}
