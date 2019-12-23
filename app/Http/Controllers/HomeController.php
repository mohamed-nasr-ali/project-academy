<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //when class call the constructor work and the auth middleware work!
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allposts = Post::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title', 'like', '%' . $request->search . '%');

            });
            // return all posts added paginate 30 post only
        })->latest()->paginate(30);

        return view('home')->with(['allposts'=>$allposts]);// return home view with all posts

    }

}
