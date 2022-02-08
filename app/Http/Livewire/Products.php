<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Product;

use Livewire\Component;

class Products extends Component
{
    use WithPagination;

    public $products, $qty;
    public $check = [];
    public $checkall = [];
    public $selectAll = false;


    public function mount(){
        $this->products = Product::latest()->where('users_id', auth()->user()->id)->get(['id', 'category_id', 'users_id', 'product_name', 'image']);
        $this->qty = Product::latest()->where('users_id', auth()->user()->id)->pluck('qty');
        $this->checkall = Product::latest()->pluck('id');
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function refresh()
    {
        $this->products = Product::latest()->where('users_id', auth()->user()->id)->get(['id', 'category_id', 'users_id', 'product_name', 'image']);
        $this->qty = Product::latest()->where('users_id', auth()->user()->id)->pluck('qty');
    }

    public function plus(Product $product, $index){
        $array = Product::where('id',$product->id)->pluck('qty')->toArray();
        $increment = $array[0] + 1;
        Product::find($product->id)->update([
            'qty' => $increment
        ]);
        $this->qty[$index] = $this->qty[$index] + 1;
    }

    public function min(Product $product, $index){
        $array = Product::where('id',$product->id)->pluck('qty')->toArray();
        $decrement = $array[0] - 1;
        Product::find($product->id)->update([
            'qty' => $decrement
        ]);
        $this->qty[$index] = $this->qty[$index] - 1;
    }

    public function selectAll()
    {
        if($this->selectAll === true){
            $this->check = Product::latest()->pluck('id');
        }else{
            $this->check = [];
        }
    }

    public function deleteAll()
    {
        $ids = $this->check;
        Product::whereIn('id', $ids)->delete();
        $this->check = [];
        $this->selectAll = false;
    }
}
