<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class AdminContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * contact_us controller:-
     * 1-index function     => return contact_us view.
     * 2-store function     => store data in contact_us table after make validate & return index page of contact_us.
     * 3-edit function      => to get specific a contact_id for update.
     * 4-update function    => update a specific contact.
     * 5-destroy function  => delete a specific contact.
     * /////////////////////
     * contactus.blade     -> the index view
     * createcontact_us.blade -> create contact view
     * editcontactus.blade -> update contact view*/
    public function index()
    {
        return view('admin.contactus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createcontactus');
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
                'edara'=>'required',
                'phone1'=>'required|max:10',
                'phone2'=>'required|max:10',
                'email'=>'required',
                'description'=>'required',
                'title'=>'required',

            ]
            ,$msg);
        $contact=new Contactus();
        $contact->edara=$request->input('edara');
        $contact->phone1=$request->input('phone1');
        $contact->phone2=$request->input('phone2');
        $contact->email=$request->input('email');
        $contact->description=$request->input('description');
        $contact->title=$request->input('title');
        $contact->save();
        return redirect(route('contactus.index'))->with('msg','Add');
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
        $contact=Contactus::find($id);
        if (is_null($contact)){
            return view('errors.404');
        }else{
            return view('admin.editcontactus')->with(['contact'=>$contact]);
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
                'edara'=>'required',
                'phone1'=>'required',
                'phone2'=>'required',
                'email'=>'required',
                'description'=>'required',
                'title'=>'required',

            ]
            ,$msg);
        $contact=Contactus::find($id);
        if (is_null($contact)){
            return view('errors.404');
        }else{
            $contact->edara=$request->input('edara');
            $contact->phone1=$request->input('phone1');
            $contact->phone2=$request->input('phone2');
            $contact->email=$request->input('email');
            $contact->description=$request->input('description');
            $contact->title=$request->input('title');
            $contact->save();
            return redirect(route('contactus.index'))->with('msg','Edit');
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
        $contact=Contactus::find($id);
        if (is_null($contact)){
            return view('errors.404');
        }else{
            $contact->destroy($id);
            return redirect(route('contactus.index'))->with('msg','Delete');
        }

    }
}
