<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

class AdminSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * Semester controller:-
     * 1-index function     => return Semester view.
     * 2-store function     => store data in Semester table after make validate & return index page of Semester.
     * 3-edit function      => to get specific a Semester_id for update.
     * 4-update function    => update a specific Semester.
     * 5-destroy function   => delete a specific Semester.
     * /////////////////////
     * createSemesters.blade              -> create types Semester
     * editSemesters.blade                -> update types Semester
     * Semesters.blade                    -> index view with all Semesters
     */

    public function index()
    {
        return view('admin.semesters');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createsemesters');
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
            'name.required'=>'enter Semester',
        ];
        $this->validate($request,
            [
                'name'=>'required',
            ]
            ,$msg);
        $semester=new Semester();
        $semester->name=$request->input('name');
        $semester->save();
        return redirect(route('semesters.index'))->with('msg','Add');
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
        $semester=Semester::find($id);
        if (is_null($semester)){
            return view('errors.404');
        }else{
            return view('admin.editsemesters')->with(['semester'=>$semester]);
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
            'name.required'=>'enter Semester',
        ];
        $this->validate($request,
            [
                'name'=>'required',
            ]
            ,$msg);
        $semester=Semester::find($id);
        if (is_null($semester)){
            return view('errors.404');
        }else{
            $semester->name=$request->input('name');
            $semester->save();
            return redirect(route('semesters.index'))->with('msg','Edit');
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
        $semester=Semester::find($id);
        if (is_null($semester)){
            return view('errors.404');
        }else{
            $semester->destroy($id);
            return redirect(route('semesters.index'))->with('msg','Delete');
        }

    }
}
