<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //!- post belongs to category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //!- post belongs to semester
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    //!- post belongs to type
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    //!- post has many of comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


}