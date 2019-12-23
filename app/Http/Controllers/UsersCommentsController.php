<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UsersCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * user_comments_controller:-
     * create_update_delete comment fo user
     * and every post has many comments in each post view comments for this post*/
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg=[
            'comment.required'=>'enter comment plz'
        ];
        $this->validate($request,
            [
                'comment'=>'required|nullable|max:200'
            ]
            ,$msg);

        $comment=new Comment();
        $comment->comment=filter_var ( strip_tags($request->input('comment')), FILTER_SANITIZE_STRING);
        $data=Crypt::decrypt($request->input('post_id'));
        $comment->post_id=$data;

        $comment->user_id=auth()->user()->id;
        $comment->save();
        return redirect(route('poster',$request->input('post_id')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
            $data=Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

        $comment=Comment::findOrFail($data);

            return view('user.editcomment')->with(['bcomment'=>$comment]);


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
            'editcomment.required'=>'enter Comment',
        ];
        $this->validate($request,
            [
                'editcomment'=>'required|nullable|max:200'
            ]
            ,$msg);
        try {
            $data=Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

        $comment=Comment::findOrFail($data);

        $comment->comment=filter_var ( strip_tags($request->input('editcomment')), FILTER_SANITIZE_STRING);
            $comment->save();
            return redirect(route('poster',$request->input('pid')));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data=Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

        $deletecomment=Comment::findOrFail($data);

            $deletecomment->destroy($data);
            return redirect()->back();


    }
}
