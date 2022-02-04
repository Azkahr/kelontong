<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Product;

use Livewire\Component;

class Products extends Component
{
    use WithPagination;

    public $qty = [];
    public $idU = [];
    public $indicator = false;

    public function mount(){
        $this->qty = Product::pluck('qty');
        $this->idU = Product::pluck('id');
    }

    public function render()
    {
        return view('livewire.product', ['products' => Product::select('id','product_name')->where('users_id', auth()->user()->id)->paginate(10)]);
    }

    public function refresh()
    {
    
    }

    public function plus($index){
        $this->qty[$index] = $this->qty[$index] + 1;
        $this->indicator = true;
    }

    public function min($index){
        $this->qty[$index] = $this->qty[$index] - 1;
        $this->indicator = true;
    }

    public function remove(){
        $this->qty = Product::pluck('qty');
        $this->indicator = false;
        $this->idU = [];
    }

    public function save(){
        $uni = collect($this->idU)->toArray(); 
        $val = collect($this->qty)->toArray();
        $length = sizeof($val) - 1;
        for($i = 0; $i <= $length; $i++){
            Product::find($uni[$i])->update([
                'qty' => $val[$i]
            ]);
        }
        $this->indicator = [];
    }
}
