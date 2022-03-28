<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class Products extends Component
{
    use WithPagination;

    public $products, $stok;
    public $check = [];
    public $selectAll = false;


    public function mount(){
        $this->products = Product::latest()->where('toko_id', auth()->user()->toko->id)->get(['id', 'product_name', 'harga', 'user_id']);
        $this->stok = Product::latest()->where('toko_id', auth()->user()->toko->id)->pluck('stok');
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function refresh()
    {
        $this->products = Product::latest()->where('toko_id', auth()->user()->toko->id)->get(['id', 'product_name', 'harga', 'user_id']);
        $this->stok = Product::latest()->where('toko_id', auth()->user()->toko->id)->pluck('stok');
    }

    public function plus(Product $product, $index){
        $array = Product::where('id',$product->id)->pluck('stok')->toArray();
        $increment = $array[0] + 1;
        Product::select(['id'])->find($product->id)->update([
            'stok' => $increment
        ]);
        $this->stok[$index] = $this->stok[$index] + 1;
    }

    public function min(Product $product, $index){
        $array = Product::where('id',$product->id)->pluck('stok')->toArray();
        $decrement = $array[0] - 1;
        Product::select(['id'])->find($product->id)->update([
            'stok' => $decrement
        ]);
        $this->stok[$index] = $this->stok[$index] - 1;
    }

    public function selectAll()
    {
        if($this->selectAll === true){
            $this->check = Product::latest()->where('toko_id', auth()->user()->toko->id)->pluck('id');
        }else{
            $this->check = [];
        }
    }

    public function unselectAll()
    {
        $this->check = [];
        $this->selectAll = false;
    }

    public function deleteAll()
    {
        $ids = $this->check;
        $findP=Product::find($ids)->pluck('image');
        for($i = 0; $i < sizeof($findP); $i++){
            $arrimg = explode(',', $findP[$i]);
            for($x = 0; $x < sizeof($arrimg); $x++){
                Storage::delete($arrimg[$x]);
            }
        }
        Product::whereIn('id', $ids)->delete();
        $this->check = [];
        $this->selectAll = false;
    }
}
