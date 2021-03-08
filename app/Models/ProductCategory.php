<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // protected $table = 'product_categories';

    protected $fillable = [
        'product_category',
        'user_id'
    ];
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function shop(){
    	return $this->belongsTo('App\Models\Shop');
    }
    function stock(){
        return $this->hasMany('App\Models\Stock');
    }
    function product(){
        return $this->hasMany('App\Models\Product');
    }
}
