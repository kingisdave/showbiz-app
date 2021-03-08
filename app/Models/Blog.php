<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'user_id', 
        'blog_title',
        'blog_body',
        'blogimage',
        'blog_category_id'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function blogCategory(){
    	return $this->belongsTo('App\Models\BlogCategory');
    }

    function comment(){
        return $this->hasMany('App\Models\Comment');
    }
}
