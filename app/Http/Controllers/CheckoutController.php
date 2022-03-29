<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Order;
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

    public function order(Request $request){

        $validatedData = $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|email:dns',
            'no_hp' => 'required|min:3',
            'alamat' => 'required|min:3',
            'kota' => 'required|min:3',
            'provinsi' => 'required|min:3',
            'kode_pos' => 'required|min:3',
        ],[
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
            'no_hp.required' => 'The nomor hp field is required.',
        ]);

        // untuk mengkalkulasi total harga
        $total = 0;
        $cart_total = Cart::where('users_id', Auth::id())->get();
        foreach($cart_total as $cart){
            $total += $cart->products->harga * $cart->qty;
        }

        // ambil total harga, id user login yang order item, dan beri nomor resi
        $validatedData['total_harga'] = $total;
        $validatedData['users_id'] = Auth::user()->id;
        $validatedData['no_resi'] = 'KLNTG' . rand(1111,9999);

        $order = Order::create($validatedData);

        $carts = Cart::where('users_id', Auth::id())->get();

        foreach($carts as $cart){
            
            OrderItem::create([
                'orders_id' => $order->id,
                'products_id' => $cart->products_id,
                'qty' => $cart->qty,
                'harga' => $cart->products->harga,
            ]);

            // setiap order item, maka stok product akan berkurang
            $product = Product::where('id', $cart->products_id)->first();
            $product->stok = $product->stok - $cart->qty;
            $product->update();
        }

        // jika item cart masuk ke order, maka cart akan dihapus
        $carts = Cart::where('users_id', Auth::id())->get();
        Cart::destroy($carts);

        notify()->success('Item sudah di order', 'Berhasil');
        
        return redirect('/my-order');
    }
}
