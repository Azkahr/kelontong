<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
            if(auth()->user()->hasVerifiedEmail()){
                return view('home', [
                    'title' => 'Home',
                    'products' => Product::latest()->take(30)->get(),
                    'productsBest' => Product::latest()->take(12)->get(),
                    'carts' => Cart::where('users_id', Auth::id())->get(),
                ]);
            }else{
                return redirect('/verify-email');
            }
        }else{
            return view('home', [
                'title' => 'Home',
                'products' => Product::latest()->take(30)->get(),
                'productsBest' => Product::latest()->take(12)->get(),
                'carts' => Cart::where('users_id', Auth::id())->get(),
            ]);
        }
    }

    public function search(){
        if(!request()->has('search')){
            return back();
        }

        return view('search',[
            'title' => 'Search',
            'carts' => Cart::where('users_id', Auth::id())->get(),
            'products' => Product::latest()->filter(request(['search', 'category']))->get(),
        ]);
    }

    public function detail(Request $request){

        $namaP = $request->produk;
        $toko = $request->toko;

        $product = Product::whereHas('toko', function($q) use ($toko){
            $q->where('nama_toko', '=' , $toko);
        })->where('product_name', $namaP)->first();

        $ratings = Rating::where('products_id', $product->id)->get();
        $reviews = Rating::where('products_id', $product->id)->get();
        
        return view('detail', [
            'title' => $product->product_name,
            'carts' => Cart::where('users_id', Auth::id())->get(),
            'product' => $product,
            "ratings" => $ratings,
            "reviews" => $reviews,
        ]);
    }
}