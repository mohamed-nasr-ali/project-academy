<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class AdminTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * types controller (every category has types as a sub of category):-
     * 1-index function     => return type view.
     * 2-store function     => store data in type table after make validate & return index page of type.
     * 3-edit function      => to get specific a type_id for update.
     * 4-update function    => update a specific type.
     * 5-destroy function   => delete a specific type.
     * /////////////////////
     * createtypes.blade              -> create type view
     * edittypes.blade                -> update type view
     * types.blade                    -> index view with all types
     */

    public function index()
    {
        return view('admin.types');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createtypes');
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
            'name.required'=>'enter Type',
            'category.required'=>'enter category',
        ];
        $this->validate($request,
            [
                'name'=>'required',
                'category'=>'required'
            ]
            ,$msg);
        $type=new Type();
        $type->name=$request->input('name');
        $type->category_id=$request->input('category');
        $type->save();
        return redirect(route('types.index'))->with('msg','Add');
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
        $type=Type::find($id);
        if (is_null($type)){
            return view('errors.404');
        }else{
            return view('admin.edittypes')->with(['type'=>$type]);
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
            'name.required'=>'enter Type',
            'category.required'=>'enter category',
        ];
        $this->validate($request,
            [
                'name'=>'required',
                'category'=>'required'
            ]
            ,$msg);
        $type=Type::find($id);
        if (is_null($type)){
            return view('errors.404');
        }else{
            $type->name=$request->input('name');
            $type->category_id=$request->input('category');
            $type->save();
            return redirect(route('types.index'))->with('msg','Edit');
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
        $type=Type::find($id);
        if (is_null($type)){
            return view('errors.404');
        }else{
            $type->destroy($id);
            return redirect(route('types.index'))->with('msg','Delete');
        }

    }
}
