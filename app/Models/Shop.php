<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function shopCategory(){
    	return $this->hasMany('App\Models\ShopCategory');
    }

    function stock(){
        return $this->hasMany('App\Models\Stock');
    }
    function product(){
        return $this->hasMany('App\Models\Product');
    }
}

