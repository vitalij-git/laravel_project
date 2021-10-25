<?php

namespace App\Http\Controllers;

use App\type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::sortable()->paginate(15);
        return view('type.index', ['types'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type =new Type;
        $type->title = $request->type_title;
        $type->description=$request->type_description;
        $type->save();
        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(type $type)
    {
        return view('type.show', ['type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(type $type)
    {
        return view('type.edit', ['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, type $type)
    {
        $type->title = $request->type_title;
        $type->description=$request->type_description;
        $type->save();
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(type $type)
    {
            $type->delete();
            return redirect()->route('type.index')->with('success_message', 'Tipas ištrintas sėkmingai');
    }
    public function search(Request $request) {


        $search = $request->search;

        $type = Type::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view("type.search",['types'=> $type]);
    }
}
