<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //!-type has many of posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //!- type belongs to category
    public  function  category()
    {
        return $this->belongsTo('App\Category');
    }
}
