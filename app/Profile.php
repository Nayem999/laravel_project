<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function post()
    {
    return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
