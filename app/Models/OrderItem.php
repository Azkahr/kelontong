<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order(){
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function rating(){
        return $this->belongsTo(Rating::class, 'rating_id');
    }
}
