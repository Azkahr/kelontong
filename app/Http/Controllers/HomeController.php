<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Home',
            'products' => Product::latest()->get(),
            'productsMakanan' => Product::whereHas('category', function($q){
                $q->where('name', '=', 'Makanan');
            })->get(),
            'productsMinuman' => Product::whereHas('category', function($q){
                $q->where('name', '=', 'Minuman');
            })->get()
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