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
    public function index(Cart $carts){

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category['name'];
        }
        
        return view('home', [
            'title' => 'Home' . $title,
            'products' => Product::latest()->paginate(30),
            'carts' => $carts->where('users_id', Auth::id())->get(),
            'productsMakanan' => Product::latest()->whereHas('category', function($q){
                $q->where('name', '=', 'Makanan');
            })->take(10)->get(),
            'productsMinuman' => Product::latest()->whereHas('category', function($q){
                $q->where('name', '=', 'Minuman');
            })->take(10)->get(),
            'productsJajanan' => Product::latest()->whereHas('category', function($q){
                $q->where('name', '=', 'Jajanan');
            })->take(10)->get(),
            'productsL' => Product::latest()->take(3)->get(),
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