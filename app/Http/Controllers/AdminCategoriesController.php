<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * category controller:-
     * 1-index function     => return category view.
     * 2-store function     => store data in category table after make validate & return index page of categories.
     * 3-edit function      => to get specific a category_id for update.
     * 4-update function    => update a specific category.
     * 5-destroy function  => delete a specific category.
     * /////////////////////
     * categories.blade     -> the index view
     * createcategory.blade -> create category view
     * editcategories.blade -> update category view*/

    public function index()
    {
        return view('admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createcategory');
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
            'name.required'=>'enter category',
        ];
        $this->validate($request,
            [
                'name'=>'required',
            ]
            ,$msg);
        $category=new Category();
        $category->name=$request->input('name');
        $category->save();
        return redirect(route('categories.index'))->with('msg','Add');
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
        $category=Category::find($id);
        if (is_null($category)){
            return view('errors.404');
        }else{
         return view('admin.editcategories')->with(['category'=>$category]);
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
        $msg = [
            'name.required' => 'enter Category',
        ];
        $this->validate($request,
            [
                'name' => 'required',
            ]
            , $msg);
        $category = Category::find($id);
        if (is_null($category)) {
            return view('errors.404');
        } else{
            $category->name = $request->input('name');
            $category->save();
            return redirect(route('categories.index'))->with('msg', 'Edit');
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
        $category=Category::find($id);
        if (is_null($category)){
            return view('errors.404');
        }else{
            $category->destroy($id);
            return redirect(route('categories.index'))->with('msg','Delete');
        }
    }
}
