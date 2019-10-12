<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    //
    public function vehicles(){
        return $this->hasMany('App\Vehicle');
    }
}
