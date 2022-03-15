<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Home',
            'products' => Product::latest()->take(30)->get(),
            'productsBest' => Product::latest()->take(12)->get(),
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

    public function detail(Product $product, User $user, Cart $carts){
        return view('detail', [
            'title' => $product->product_name,
            'carts' => $carts->where('users_id', Auth::id())->get(),
            'product' => $product,
            "totalqty" => Product::where('id', $product->id)->sum('stok'),
            'user' => $user
        ]);
    }
}