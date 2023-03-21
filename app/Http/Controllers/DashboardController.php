<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard',[
            "title" => "Dashboard",
            'category_s' => Product::select(['category_id'])->where('toko_id', auth()->user()->toko->id)->distinct()->get(),
            "allpost" => Product::all()->where('toko_id', auth()->user()->toko->id)->count(),
            "totalqty" => Product::all()->where('toko_id', auth()->user()->toko->id)->sum('stok'),
        ]);
    }

    public function orders(){
        
        return view('dashboard.order', [
            "title" => "Order",
            "orders" => Order::where('status', "pending")->orWhere('status', 'proses')->orWhere('status', 'kirim')->get()
        ]);
    }

    public function orderHistory(){

        return view('dashboard.history', [
            "title" => "Order",
            "orders" => Order::where('status', "beres")->orWhere('status', "tolak")->get()
        ]);
    }
    
    public function view($id){
        
        return view('dashboard.view', [
            "title" => "Order",
            "orders" => Order::where('id', $id)->first()
        ]);
    }
    
    public function updateOrder(Request $request, $id){

        $orders = Order::find($id);
        
        if($request->input('status') == "tolak"){
            
            $validatedData = $request->validate([
                'message' => 'required'
            ]);
            $orders->status = $request->input('status');
            $orders->message = $validatedData['message'];
            $orders->update();
                
        } else {
            
            $orders->status = $request->input('status');
            $orders->update();
        }

        smilify('success', 'Status order diupdate');

        return redirect()->back();
    }

    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Tambah Product',
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_name' => 'required|min:3',
            'stok' => 'required|digits_between:1,9999999',
            'harga' => 'required|digits_between:1,9999999',
            'desc' => 'required',
            'category_id' => 'required',
            'image' => ['required', 'max:2048'],
            'image.*' => 'mimes:jpeg,jpg,png,JPG'
        ],[
            'image.*.mimes' => 'Image File Not Supported'
        ]);

        if($request->file('image')){
            $length = sizeof($request->file('image'));
            for($i=0; $i < $length; $i++){
                $request->file('image')[$i]->store('product-images');
                $image[$i] = $request->file('image')[$i]->store('product-images');
            }
            $arrImg=implode(',', $image);
            $validatedData['image'] = $arrImg;
        }
        
        $harga = str_replace(array('.'), '', $validatedData['harga']);
        $validatedData['harga'] = (int)$harga;

        $validatedData['toko_id'] = auth()->user()->toko->id;
        $validatedData['user_id'] = auth()->user()->id;
        
        
        Product::create($validatedData);

        smilify('success', 'Produk Ditambahkan');

        return redirect('/dashboard');
    }

    public function show(Product $product)
    {
        if($product->user_id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.show', [
            'title' => "Single product",
            "totalqty" => Product::where('id', $product->id)->sum('stok'),
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        if($product->user_id !== auth()->user()->id){
            abort(403);
        }
        
        return view('dashboard.edit', [
            'title' => "Edit",
            'categories' => Category::all(),
            'product' => $product,
            'image' => explode(',',$product->image)
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request -> validate([
            'product_name' => 'required|min:3',
            'stok' => 'required|digits_between:1,9999999',
            'harga' => 'required|digits_between:1,9999999',
            'desc' => 'required',
            'category_id' => 'required',
            'image' => 'max:2048',
            'image.*' => 'mimes:jpeg,jpg,png,JPG',
        ],[
            'image.*.mimes' => 'Image File Not Supported'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                for($i=0; $i < sizeof(explode(',', $request->oldImage)); $i++){
                    $arrimg = explode(',', $request->oldImage);
                    Storage::delete($arrimg[$i]);
                }
            }
            $length = sizeof($request->file('image'));
            for($i=0; $i < $length; $i++){
                $request->file('image')[$i]->store('product-images');
                $image[$i] = $request->file('image')[$i]->store('product-images');
            }
            $arrImg=implode(',', $image);
            $validatedData['image'] = $arrImg;
        }else{
            $validatedData['image'] = $request->oldImage;
        }

        $harga = str_replace(array('.'), '', $validatedData['harga']);
        $validatedData['harga'] = (int)$harga;
        
        $validatedData['toko_id'] = auth()->user()->toko->id;
        $validatedData['user_id'] = auth()->user()->id;

        Product::where('id', $request->id)->update([
            'product_name' => $validatedData['product_name'],
            'harga' => $validatedData['harga'],
            'toko_id' => $validatedData['toko_id'],
            'stok' => $validatedData['stok'],
            'desc' => $validatedData['desc'],
            'category_id' => $validatedData['category_id'],
            'image' => $validatedData['image']
        ]);

        smilify('success', 'Produk Berhasil Diedit');
        
        return redirect(route('dashboard'));
    }

    public function destroy(Request $request)
    {
        if(!$request->user_id == auth()->user()->id){
            abort(403);
        }

        $user = Product::find($request->id);
        for($i=0; $i < sizeof(explode(',', $user->image)); $i++){
            $arrimg = explode(',', $user->image);
            Storage::delete($arrimg[$i]);
        }
        $user->delete();
        return back();
    }
}
