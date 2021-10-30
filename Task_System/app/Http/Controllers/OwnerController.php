<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $owner= Owner::all();
       return view('owner.index', ['owners'=>$owner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner= new Owner;
       $request->validate([
            'owner_name'=>'required|between:2,15|regex:/^[a-zA-Z]+$/u',
            'owner_surname'=>'required|between:2,15|regex:/^[a-zA-Z]+$/u',
            'owner_email'=>'required|email',
            'owner_phone'=>'required|numeric'


        ]);
        $owner->name=$request->owner_name;
        $owner->surname=$request->owner_surname;
        $owner->email=$request->owner_email;
        $owner->phone=$request->owner_phone;
        $owner->save();
        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit', ['owner'=> $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $owner->name=$request->owner_name;
        $owner->surname=$request->owner_surname;
        $owner->email=$request->owner_email;
        $owner->phone=$request->owner_phone;
        $owner->save();
        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owner.index');
    }
}
