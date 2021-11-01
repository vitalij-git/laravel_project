<?php

namespace App\Http\Controllers;

use App\PaginationSetting;
use Illuminate\Http\Request;

class PaginationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination= PaginationSetting::all();
        return view ('paginationsetting.index', ['paginations'=>$pagination]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('paginationsetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagination =new PaginationSetting;
        $request->validate([
            'pagination_title'=>'required|between:1,225|regex:/^[a-zA-Z0-9]+$/u',
            'pagination_value'=>'required|integer'

        ]);
        $pagination->title=$request->pagination_title;
        $pagination->value=$request->pagination_value;
        if($request->pagination_visible=="on"){
            $pagination->visible=1;
        }else{
            $pagination->visible=0;
        }
        $pagination->save();
        return redirect()->route('paginationsetting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSetting $paginationsetting)
    {
        return view ('paginationsetting.show', ['pagination'=>$paginationsetting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSetting $paginationsetting)
    {

        return view ('paginationsetting.edit', ['pagination'=>$paginationsetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginationSetting $paginationsetting)
    {
        $request->validate([
            'pagination_title'=>'required|between:1,225|regex:/^[a-zA-Z0-9]+$/u',
            'pagination_value'=>'required|integer',
            'pagination_visible'=>'numeric|integer'


        ]);
        $paginationsetting->title=$request->pagination_title;
        $paginationsetting->value=$request->pagination_value;
        if($request->pagination_visible=="on"){
            $paginationsetting->visible=1;
        }else{
            $paginationsetting->visible=0;
        }
        $paginationsetting->save();
        return redirect()->route('paginationsetting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaginationSetting  $paginationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSetting $paginationSetting)
    {
        $paginationSetting->delete();
        return redirect()->route('paginationsetting.index')->with('success_message', 'Tipas ištrintas sėkmingai');
    }
}
