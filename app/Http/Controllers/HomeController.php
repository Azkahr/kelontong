<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Home',
            'products' => Product::latest()->paginate(35),
            'productsMakanan' => Product::latest()->whereHas('category', function($q){
                $q->where('name', '=', 'Makanan');
            })->take(10)->get(),
            'productsMinuman' => Product::latest()->whereHas('category', function($q){
                $q->where('name', '=', 'Minuman');
            })->take(10)->get(),
            'productsL' => Product::latest()->take(3)->get(),
        ]);
    }

    public function search(){
        if(!request()->has('search')){
            return back();
        }

        return view('search',[
            'title' => 'Search',
            'products' => Product::latest()->filter(request(['search', 'category']))->get(),
        ]);
    }
}