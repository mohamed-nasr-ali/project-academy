<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
     * user controller:-
     * 1-view all users
     * 2-edit name and email only for user
     * 3-destroy user*/
    public function index(Request $request)
    {
        $users = User::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('name', 'like', '%' . $request->search . '%') ;

            });

        })->latest()->paginate(10);


        return view('admin.users')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        if (is_null($user)){
            return view('errors.404');
        }else {
            return view('admin.editusers')->with(['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $msg=[
            'name.required'=>'*enter your name',
            'email.required'=>'*plz put a right mail'
        ];
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required'
            ]
            ,$msg);
        $user=User::find($id);
        if (is_null($user)){
            return view('errors.404');
        }else {
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->save();
            return redirect(route('users.index'))->with('msg','Edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user=User::find($id);
       if (is_null($user)){
           return view('errors.404');
       }else {
           $user->destroy($id);
           return redirect(route('users.index'))->with('msg', 'Delete');
       }
    }
}
