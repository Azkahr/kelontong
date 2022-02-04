<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * test commit
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dashboard',[
            "title" => "Dashboard",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Tambah Product',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_name' => 'required|min:3',
            'qty' => 'required|digits_between:1,9999999',
            'desc' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        
        $validatedData['users_id'] = auth()->user()->id;
        
        Product::create($validatedData);

        return redirect(route('dashboard'))->with('success', 'Produk Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('dashboard.edit', [
            $request->id,
            'title' => "edit",
            'categories' => Category::all(),
            'products' => Product::where('users_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/dashboard')->with('success', 'Product has been deleted');
    }
}
