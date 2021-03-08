<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function productCategory(){
    	return $this->belongsTo('App\Models\ProductCategory');
    }
    function order(){
        return $this->hasMany('App\Models\Order');
    }
    function review(){
        return $this->hasMany('App\Models\Review');
    }
}
