<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Semester;
use App\Type;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * posts controller:-
     * 1-index function     => return posts view.
     * 2-store function     => store data in posts table after make validate & return index page of posts.
     * 3-edit function      => to get specific a post_id for update.
     * 4-update function    => update a specific post.
     * 5-destroy function   => delete a specific post.
     * /////////////////////
     * choosecategoryofpost.blade     -> to choose category of post before create post.
     * createposts.blade              -> create post view
     * editposts.blade                -> update post view
     * posts.blade                    -> index view with all posts
     * postsnav                       -> common nav to specify category or type of category
     * viewcategory.blade             -> to view category with all posts of this category
     * viewtype.blade                 -> view type of category with all posts of this type*/

    public function index(Request $request)
    {
        $posts = Post::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(3);

        return view('admin.posts')->with(['posts'=>$posts]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.choosecategoryofpost');
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
            'required'=>'plz fill the above blank input with the correct value',
        ];
        $this->validate($request,
            [
                'title'=>'required',
                'time'=>'required',
                'image'=>'required|image',
                'info'=>'required',
                'year'=>'required',
                'category'=>'required',
                'semester'=>'required',
                'type'=>'required',
                'status'=>'required'

            ]
            ,$msg);
        if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumbnail.'.$imageExt;
            $request->file('image')->storeAs('thumbnails/',$imageName);
        }
        $post=new Post();

        $post->title=$request->input('title');
        $post->time=$request->input('time');
        $post->image=$imageName;
        $post->info=$request->input('info');
        $post->year=$request->input('year');
        $post->category_id=$request->input('category');
        $post->semester_id=$request->input('semester');
        $post->type_id=$request->input('type');
        $post->status=$request->input('status');
        $post->save();
        return redirect(route('posts.index'))->with('msg','Add');
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
        $post=Post::find($id);
        if (is_null($post)){
            return view('errors.404');
        }else{
            return view('admin.editposts')->with(
                [
                    'post'=>$post
                ]);
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
            'required'=>'plz fill the above blank input with the correct value',
        ];
        $this->validate($request,
            [
                'title'=>'required',
                'time'=>'required',
                'image'=>'required|image',
                'info'=>'required',
                'year'=>'required',
                'category'=>'required',
                'semester'=>'required',
                'type'=>'required',
                'status'=>'required'

            ]
            ,$msg);
        if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumbnail.'.$imageExt;
            $request->file('image')->storeAs('thumbnails/',$imageName);
        }
        $post=Post::find($id);
        if (is_null($post)){
            return view('errors.404');
        }else{
            $post->title=$request->input('title');
            $post->time=$request->input('time');
            $post->image=$imageName;
            $post->info=$request->input('info');
            $post->year=$request->input('year');
            $post->category_id=$request->input('category');
            $post->semester_id=$request->input('semester');
            $post->type_id=$request->input('type');
            $post->status=$request->input('status');
            $post->save();
            return redirect(route('posts.index'))->with('msg','Edit');
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
        $post=Post::find($id);
        if (is_null($post)){
            return view('errors.404');
        }else{
            $post->destroy($id);
            return redirect(route('posts.index'))->with('msg','Delete');
        }

    }

}
