<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //!- category has many of posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //!- category has many of types as sub of category
    public function types()
    {
        return $this->hasMany('App\Type');
    }
}
