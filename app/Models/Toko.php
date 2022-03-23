<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with=['toko'];

    protected $table = 'toko';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
