<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        
        // agar product yang stoknya sudah habis tidak bisa masuk ke checkout page
        $old_carts = Cart::where('users_id', Auth::id())->get();
        foreach($old_carts as $cart){

            if(!Product::where('id', $cart->products_id)->where('stok', '>=', $cart->qty)->exists()){
                
                $delete = Cart::where('users_id', Auth::id())->where('products_id', $cart->products_id);
                $delete->delete();
            }
        }

        $carts = Cart::where('users_id', Auth::id())->get();
        
        return view('checkout', [
            "title" => "Checkout",
            "carts" => $carts
        ]);
    }
}
