<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //!- role belongs to many users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
