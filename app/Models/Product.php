<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stock_id', 
        'product_name',
        'product_brand',
        'product_quantity',
        'product_category_id',
        'product_description',
        'product_price',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function productCategory(){
    	return $this->belongsTo('App\Models\ProductCategory');
    }
    public function stock(){
        return $this->hasOne('App\Models\Stock');
    }
    function stockImage(){
        return $this->hasMany('App\Models\StockImage');
    }
    function order(){
        return $this->hasMany('App\Models\Order');
    }
    function review(){
        return $this->hasMany('App\Models\Review');
    }
}
