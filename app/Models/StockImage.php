<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    use HasFactory;

    protected $table = 'stock_images';
    
    protected $fillable = [ 
        'stock_id',
        'stockImages',
    ];

    public function stock(){
    	return $this->belongsTo('App\Models\Stock');
    }
    public function product(){
    	return $this->belongsTo('App\Models\Product');
    }
    public function blog(){
    	return $this->belongsTo('App\Models\Blog');
    }
}
