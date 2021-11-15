<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops=Shop::sortable()->paginate(10);
        return view('shop.index', ['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop= new Shop;
        $request->validate([
            'shop_title'=>'required|between:6,225|regex:/^[a-zA-Z]+$/u',
            'shop_description'=>'required|max:1500',
            'shop_email'=>'required|email:rfc,dns',
            'shop_phone'=>'required|digits_between:9,9',
            'shop_country'=>'required|regex:/^[a-zA-Z]+$/u',
        ]);
        $shop->title=$request->shop_title;
        $shop->description=$request->shop_description;
        $shop->email=$request->shop_email;
        $shop->phone=$request->shop_phone;
        $shop->country=$request->shop_country;

        $shop->save();
        $success =[
            'success'=> 'shop added successfully',
            'shopID'=>$shop->id,
            'shop_title'=>$shop->title,
            'shop_email'=>$shop->email,
            'shop_description'=>$shop->description,
            'shop_phone'=>$shop->phone,
            'shop_country'=>$shop->country,


        ];
        $success_json=response()->json($success);

        return $success_json;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shop.show', ['shop'=>$shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('shop.edit', ['shop'=>$shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'shop_title'=>'required|between:6,225|regex:/^[a-zA-Z]+$/u',
            'shop_description'=>'required|max:1500',
            'shop_email'=>'required|email',
            'shop_phone'=>'required|digits_between:9,9',
            'shop_country'=>'required|regex:/^[a-zA-Z]+$/u',
        ]);
        $shop->title=$request->shop_title;
        $shop->description=$request->shop_description;
        $shop->email=$request->shop_email;
        $shop->phone=$request->shop_phone;
        $shop->country=$request->shop_country;

        $shop->save();
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shopCount= $shop->hasManyCategory->count();

        if($shopCount == 0) {
            $shop->delete();
        } else {
            return redirect()->route('shop.index')->with("error_message", "Parduotuvė turi kategoriju ");
        }

        return redirect()->route('shop.index')->with("success_message", "parduotuvė sėkmingai ištrinta");
    }
}
