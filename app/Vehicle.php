<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category',
        'manufacture_year',
        'mileage', 'price',
        'vehicle_image'
    ];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\VahicleCategory');
    }
}
