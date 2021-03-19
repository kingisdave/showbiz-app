<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    public function shop(){
    	return $this->belongsTo('App\Models\Shop');
    }
    function product(){
        return $this->hasMany('App\Models\Product');
    }
    function order(){
        return $this->hasMany('App\Models\Order');
    }
}
