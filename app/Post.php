<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','privacy','user_id','photo'
    ];
    public function user()
    {
    return $this->belongsToMany('App\User');
    }
    public function profile()
    {
    return $this->belongsToMany('App\Profile');
    }
    public function reaction()
    {
    return $this->hasMany('App\Reaction');
    }
    public function comment()
    {
    return $this->hasMany('App\Comment');
    }
}
