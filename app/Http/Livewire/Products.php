<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Product;

use Livewire\Component;

class Products extends Component
{
    use WithPagination;

    public $qty, $awal;
    public $check = [];

    public function mount(){
        $this->qty = Product::pluck('qty');
    }

    public function render()
    {
        return view('livewire.product', ['products' => Product::where('users_id', auth()->user()->id)->paginate(10)]);
    }

    public function plus($index, $id){
        $this->qty[$index] = $this->qty[$index] + 1;
        array_push($this->check, $id);
    }

    public function min($index, $id){
        $this->qty[$index] = $this->qty[$index] - 1;
        array_push($this->check, $id);
    }

    public function remove(){
        $this->qty = Product::pluck('qty');
        $this->check = [];
    }

    public function save(){
        dd($this->check);
    }
}
