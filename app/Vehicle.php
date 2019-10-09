<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'vehicle_maker_id',
        'manufacture_year',
        'mileage',
        'price',
        'vehicle_image',
        'category_id'
    ];
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function VehicleCategory(){
        return $this->belongsTo('App\VahicleCategory');
    }
    public function VehicleMaker(){
        return $this->belongsTo('App\VehicleMaker');
    }
}
