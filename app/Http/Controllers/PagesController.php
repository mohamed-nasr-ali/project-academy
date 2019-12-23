<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PagesController extends Controller
{

    //!- to view a specific category with all posts in this category
    public function viewcategories($id)
    {
        $category=Category::find($id);
        if (is_null($category)){
            return view('errors.404');
        }else{
            $posts=$category->posts;

            return view('admin.viewcategory')->with
            (
                [
                    'posts'=>$posts,
                    'category'=>$category
                ]
            );
        }
    }

    //!- to view a specific type with all posts of this type
    public function viewtypes($id)
    {
        $type=Type::find($id);
        if (is_null($type)){
            return view('errors.404');
        }else{
            $posts=$type->posts;
            return view('admin.viewtype')->with
            (
                [
                    'posts'=>$posts,
                    'type'=>$type
                ]
            );
        }
    }

    //!- to get specific category and view all types in this category to choose only
    // the types of this category when create a new post
    public function checkcategory($id){
        $cat=Category::find($id);
        if (is_null($cat)){
            return view('errors.404');
        }else{
            $types=$cat->types;
            return view('admin.createposts')->with
            (
                [
                    'typies'=>$types,
                    'cat'=>$cat
                ]
            );
        }
    }

    //!- find a specific post and all comments and in view if post_id equal to post_id for comments show the comments
    public function poster($id){


        try {
            $data=Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

        $poster=Post::findOrFail($data);

            if ($poster->status==1)
            {
                $comments=Comment::latest()->get();
                return view('user.poster')->with(['poster'=>$poster,'comments'=>$comments]);
            }else{
                return view('errors.502');
            }

    }

    //!- find a category and all posts in this category
    //( notes: make it before in viewcategories function in this controller prefer to put it in share and change views)
    public function group($id){
        $group=Category::find($id);
        if (is_null($group)){
            return view('errors.404');
        }else{
            $postes=$group->posts;
            return view('user.group')->with
            (
                [
                    'group'=>$group,
                    'postes'=>$postes
                ]
            );
        }
    }

    //find a type of category and all posts of this type
    //( notes: make it before in viewtypes function in this controller prefer to put it in share and change views)
    public function subofgroup($id){
        $sub=Type::find($id);
        if (is_null($sub)){
            return view('errors.404');
        }else{
            $postes=$sub->posts;
            return view('user.subofgroup')->with
            (
                [
                    'sub'=>$sub,
                    'postes'=>$postes
                ]
            );
        }
    }


    //active user
    public function active(Request $request,$id)
    {
        $this->validate($request,
            [
                'active'=>'required',
            ]
        );
        $user=User::find($id);
        if (is_null($user)){
            return view('errors.404');
        }else {
            $user->status = $request->input('active');
            $user->save();
            return redirect(route('users.index'))->with('msg', 'done');
        }
    }
    //active newuser
    public function newuseractive(Request $request,$id)
    {
        $this->validate($request,
            [
                'active'=>'required',
            ]
        );
        $user=User::find($id);
        if (is_null($user)){
            return view('errors.404');
        }else {
            $user->status = $request->input('active');
            $user->isnew  = $request->input('isnew');
            $user->save();
            return redirect(route('newusers'))->with(['msg'=>'done']);
        }
    }
    //new users
    public function newusers()
    {
        $users=User::where('isnew','true')->latest()->get();
        return view('admin.newusers')->with(['users'=>$users]);
    }


}
