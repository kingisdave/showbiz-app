<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $table = 'blogcategory';

    protected $fillable = [
        'blog_category',
        'user_id'
    ];
    function user(){
        return $this->belongsToMany('App\Models\User');
    }

    function blog(){
        return $this->hasMany('App\Models\Blog');
    }
}
