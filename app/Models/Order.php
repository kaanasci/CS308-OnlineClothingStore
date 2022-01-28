<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total'];

    public function products(){

        return $this->belongsToMany(Product::class)->withPivot('qty','total','status','address');
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
