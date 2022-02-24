<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $with=['user', 'category'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('product_name', 'like', '%' . $search . '%')
                            ->orWhere('desc', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
