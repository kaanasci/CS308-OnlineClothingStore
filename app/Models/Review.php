<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id' ,'comment', 'rating',
    ];

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
