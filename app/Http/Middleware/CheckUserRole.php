<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //!- middleware to check user role
    public function handle($request, Closure $next)
    {
        //not user redirect to login
        if ($request->user()===null)
        {
            return redirect(route('login'));
        }
        //go to routes and get action
        $actions=$request->route()->getAction();
        //if action isset and has roles and not null put it in variable $roles
        $roles=isset($actions['roles']) ? $actions['roles'] : null;
        if (($request->user()->hasAnyRole($roles) || !$roles) &&(Auth::user()->status=='1') ) //if user has any role ok
        {
            return $next($request);
        }
        // in other cases
        return abort(403,'notauth');

    }
}
