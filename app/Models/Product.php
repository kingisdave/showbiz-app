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
        'order_status_id',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function shop(){
    	return $this->belongsTo('App\Models\Shop');
    }
    public function productCategory(){
    	return $this->belongsTo('App\Models\ProductCategory');
    }
    function orderStatus(){
        return $this->belongsTo('App\Models\OrderStatus');
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
