<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request, Product $product){

        $itemuser = $request->user();
        $itemcart = Cart::where('users_id', $itemuser->id)
                        ->where('status_cart', 'cart')
                        ->first();
        return view('cart', [
            'title' => 'Shopping Cart',
            'itemcart' => $itemcart,
            'product' => $product,
        ])->with('no', 1);
    }

    public function clearCart($id){
        
        $itemcart = Cart::findOrFail($id);
        $itemcart->detail()->delete(); // hapus semua item di cart detail
        $itemcart->updateTotal($itemcart, '-' . $itemcart->subtotal);
        
        return back()->with('success', 'Cart berhasil dikosongkan');
    }
}
