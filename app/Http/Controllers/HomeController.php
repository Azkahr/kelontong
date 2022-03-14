<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category['name'];
        }
        
        return view('home', [
            'title' => 'Home' . $title,
            'products' => Product::latest()->paginate(30),
            'productsBest' => Product::latest()->take(12)->get(),
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

    public function detail(Product $product, User $user){
        return view('detail', [
            'title' => $product->product_name,
            'product' => $product,
            "totalqty" => Product::where('id', $product->id)->sum('stok'),
            'user' => $user
        ]);
    }
}