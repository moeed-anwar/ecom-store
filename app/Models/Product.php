<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'description',
        'stock',
        'price',
        'image',
        'is_active',
    ];
    public function category(){
        return $this->belongsto(Category::class);
    }
}
