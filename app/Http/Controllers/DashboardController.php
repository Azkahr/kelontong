<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

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
            'category_s' => Product::select(['category_id'])->where('users_id', auth()->user()->id)->distinct()->get(),
            "allpost" => Product::all()->where('users_id', auth()->user()->id)->count(),
            "totalqty" => Product::all()->where('users_id', auth()->user()->id)->sum('qty'),
            
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
            'title' => 'required|min:3',
            'desc' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        
        $validatedData['users_id'] = auth()->user()->id;
        
        Product::create($validatedData);

        smilify('success', 'Produk Ditambahkan');

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if($product->users_id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.show', [
            'title' => "Single product",
            "totalqty" => Product::where('id', $product->id)->sum('qty'),
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if($product->users_id !== auth()->user()->id){
            abort(403);
        }
        
        return view('dashboard.edit', [
            'title' => "Edit",
            'categories' => Category::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request -> validate([
            'product_name' => 'required|min:3',
            'qty' => 'required|between:1,9999999',
            'title' => 'required|min:3',
            'desc' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete([$request->oldImage]);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }else{
            $validatedData['image'] = $request->oldImage;
        }

        Product::where('id', $request->id)->update([
            'product_name' => $validatedData['product_name'],
            'title' => $validatedData['title'],
            'qty' => $validatedData['qty'],
            'desc' => $validatedData['desc'],
            'category_id' => $validatedData['category_id'],
            'image' => $validatedData['image']
        ]);

        smilify('success', 'Produk Berhasil Diedit');
        
        return redirect(route('dashboard'));
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
        return back();
    }
}
