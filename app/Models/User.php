<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'user_name',
        'email',
        'password', 
        'provider',
        'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function blogCategory(){
        return $this->hasMany('App\Models\BlogCategory');
    }
    function blog(){
        return $this->hasMany('App\Models\Blog');
    }
    function productCategory(){
        return $this->hasMany('App\Models\ProductCategory');
    }
    function product(){
        return $this->hasMany('App\Models\Product');
    }
    function order(){
        return $this->hasMany('App\Models\Order');
    }
    function review(){
        return $this->hasMany('App\Models\Review');
    }

}
