<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'model', 'number', 'description', 'quantity_in_stocks', 'price', 'warranty_status', 'distributor_info', 'image',
    ];

    public function category(){

        $this->belongsToMany(Category::class);
    }

    public function reviews(){

        return $this->hasMany(Review::class);
    }

    public function orders(){

        $this->belongsToMany(Order::class);
    }
}
