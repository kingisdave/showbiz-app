<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    use HasFactory;

    
    function user(){
        return $this->belongsTo('App\Models\User');
    }
    function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
