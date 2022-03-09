<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'products_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduct = Product::findOrFail($request->products_id);
        // cek apakah sudah ada shopping cart untuk user yang login
        $cart = Cart::where('users_id', $itemuser->id)
                    ->where('status_cart', 'cart')
                    ->first();

        if($cart){
            $itemcart = $cart;
        } else {
            $no_invoice = Cart::where('users_id', $itemuser->id)->count();
            // cari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            $inputancart['users_id'] = $itemuser->id;
            $inputancart['no_invoice'] = ' INV ' . str_pad(($no_invoice + 1), '3', '0', STR_PAD_LEFT);
            $inputancart['status_cart'] = 'cart';
            $inputancart['status_pembayaran'] = 'belum';
            $inputancart['status_pengiriman'] = 'belum';
            $itemcart = Cart::create($inputancart);
        }

        // cek apakah sudah ada produk di shopping cart
        $cekdetail = CartDetail::where('carts_id', $itemcart->id)
                                ->where('products_id', $itemproduct->id)
                                ->first();
        $qty = 1; 
        $harga = $itemproduct->harga;
        $subtotal = ($qty * $harga);
        
        if($cekdetail){
            // update detail di table cart_details
            $cekdetail->updateDetail($cekdetail, $qty, $harga);
            // update subtotal dan total di table cart
            $cekdetail->cart->updateTotal($cekdetail->cart, $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['carts_id'] = $itemcart->id;
            $inputan['products_id'] = $itemcart->id;
            $inputan['qty'] = $qty;
            $inputan['harga'] = $harga;
            $inputan['subtotal'] = ($harga * $qty);
            $itemdetail = CartDetail::create('inputan');
            // update subtotal dan total pada table cart
            $itemdetail->cart->updateTotal($itemdetail->cart, $subtotal);

            return redirect('/cart')->with('success', 'Product berhasil ditambahkan ke cart');
        }
    }

    public function update(Request $request, $id){

        $itemdetail = Cart::findOrFail($id);
        $param = $request->param;

        if($param == 'tambah'){
            // update detail cart
            $qty = 1;
            $itemdetail->updateDetail($itemdetail, $qty, $itemdetail->harga);
            // update total cart
            $itemdetail->updateTotal($itemdetail->cart, ($itemdetail->harga * $qty));
            return back()->with('success', 'Item berhasil diupdate');
        }
    }
}
