<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index(Product $product){
        return view('cart', [
            'title' => 'Cart',
            'product' => $product
        ]);
    }

    public function addToCart($id){

    $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $cart = session()->get('cart');

        // jika cart kosong, maka ini product pertama
        if(!$cart){

            $cart = [
                $id => [
                    "product_name" => $product->product_name,
                    "quantity" => 1,
                    "harga" => $product->harga,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);

            smilify('berhasil', 'Berhasil ditambahkan ke keranjang');

            return redirect()->back();

            if(isset($cart[$id])){
                $cart[$id]['quantity']++;

                session()->put('cart', $cart);

                smilify('berhasil', 'Berhasil ditambahkan ke keranjang');

                return redirect()->back();
            }
        }

        $cart[$id] = [
            "product_name" => $product->product_name,
            "quantity" => 1,
            "harga" => $product->harga,
            "image" => $product->image
        ];

        session()->put('cart', $cart);

        smilify('berhasil', 'Berhasil ditambahkan ke keranjang');

        return redirect()->back();
    }

    public function update(Request $request) {
        
        if($request->id && $request->quantity){
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

        }
    }

    public function delete(Request $request) {
        
        if($request->id){

            $cart = session()->get('cart');

            if(isset($cart[$request->id])){
                
                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }
        }
    }
}
