<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use App\Company;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $company = Company::all();
        $type =Type::all();
        return view("type.index",['types' => $type, "companies"=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view("type.create",['companies' => $company]);
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
        $type->description = $request->type_description;
        $type->company_id = $request->type_company_id;

        $type->save();

        return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view("type.show",['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $company = Company::all();
        return view("type.edit",['type' => $type,'companies' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $type->title = $request->type_title;
        $type->description = $request->type_description;
        $type->company_id = $request->type_company_id;

        $type->save();

        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route("type.index")->with('success_message', 'Tipas ištrintas sėkmingai');
    }
}
