<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Home',
            'productLatest' => Product::latest()->first(),
            'productsMakanan' => Product::whereHas('category', function($q){
                $q->where('name', '=', 'Makanan');
            })->get(),
            'productsMinuman' => Product::whereHas('category', function($q){
                $q->where('name', '=', 'Minuman');
            })->get()
        ]);
    }
}