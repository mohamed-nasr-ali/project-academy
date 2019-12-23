<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //!- semester has many of posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
