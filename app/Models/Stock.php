<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'stock_name',
        'stock_brand',
        'stock_quantity',
        'product_category_id',
        'cost_price',
        'selling_price',
        'expiry_date'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function shop(){
    	return $this->belongsTo('App\Models\Shop');
    }
    function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory');
    }
    function stockImage(){
        return $this->hasMany('App\Models\StockImage');
        // return $this->belongsToMany('App\Models\StockImage');
    }
    
}
