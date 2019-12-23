<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //!- user belongs to many roles and role belongs to many users
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    //!- user  has many comments
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //!-check user roles
    public function hasAnyRole($roles)
    {
        //!-if user array roles
        if (is_array($roles))
        {
            foreach ($roles as $role)
            {
                if ($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            //!-if user role
            if ($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }

    //!-if user one role
    public function hasRole($role)
    {
        if ($this->roles()->where('name',$role)->first())
        {
            return true;
        }
        return false;
    }
}
