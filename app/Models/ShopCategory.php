<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;

    
    function user(){
        return $this->belongsToMany('App\Models\User');
    }
    function shop(){
        return $this->hasMany('App\Models\Shop');
    }

}
