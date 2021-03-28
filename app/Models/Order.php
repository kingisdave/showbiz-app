<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stock_id',
        'user_address',
        'product_name',
        'product_brand',
        'order_quantity',
        'product_description',
        'product_category_id',
        'product_price',
        'order_status_id',
        'buyer_id',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function orderStatus(){
        return $this->belongsTo('App\Models\OrderStatus');
    }
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
