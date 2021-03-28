<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street_address',
        'city_address',
        'state_address',
        'country_address',
        'zip_code',
    ];

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
