<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id', 'title', 'description',
    ];
    public function User()
    {
        return $this->hasOne('App\User');
    }
}
