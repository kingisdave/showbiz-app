<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_body',
        'user_id',
        'blog_id'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function blog(){
    	return $this->belongsTo('App\Models\Blog');
    }
}
