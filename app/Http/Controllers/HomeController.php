<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Home',
            'products' => Product::latest()->take(30)->get(),
            'productsBest' => Product::latest()->take(12)->get(),
            'carts' => Cart::where('users_id', Auth::id())->get(),
        ]);
    }

    public function search(Cart $carts){
        if(!request()->has('search')){
            return back();
        }

        return view('search',[
            'title' => 'Search',
            'carts' => $carts->where('users_id', Auth::id())->get(),
            'products' => Product::latest()->filter(request(['search', 'category']))->get(),
        ]);
    }

    public function detail(Request $request){

        $namaP = $request->produk;
        $toko = $request->toko;

        $product = Product::whereHas('user', function($q) use ($toko){
            $q->where('nama_toko', '=' , $toko);
        })->where('product_name', $namaP)->first();

        return view('detail', [
            'title' => $product->product_name,
            'carts' => Cart::where('users_id', auth()->user()->id),
            'product' => $product,
        ]);
    }
}