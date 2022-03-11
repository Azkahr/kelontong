<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cart(){
        return $this->belongsTo(Cart::class, 'carts_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'products_id');
    }

    // function untuk update qty, dan subtotal
    public function updateDetail($itemdetail, $qty, $harga){
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($qty * ($harga));
        self::save();
    }
}
