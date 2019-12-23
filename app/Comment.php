<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //!-comment belongs to post
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    //!- comment belongs to user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
