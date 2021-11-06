<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::sortable()->paginate(10);
        $categories=Category::all();
        return view('product.index', ['products'=>$products, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('product.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product =new Product;

        $product->title=$request->product_title;
        $product->description=$request->product_description;
        $product->excerpt=$request->product_excerpt;
        $product->price=$request->product_price;
        if($request->hasFile("product_image")){

            $file = $request->file("product_image");
            $extention=$file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move("uploads/product", $filename);
            $product->image = "uploads/product/".$filename;
        }
        else{
            $product->image='uploads/images/placeholder.png';
        }
        $product->category_id=$request->product_category_id;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('product.edit', ['categories'=>$categories, 'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title=$request->product_title;
        $product->description=$request->product_description;
        $product->excerpt=$request->product_excerpt;
        $product->price=$request->product_price;
        if($request->hasFile("product_image")){

            $file = $request->file("product_image");
            $extention=$file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move("uploads/product", $filename);
            $product->image = "uploads/product/".$filename;
        }
        else{
            $product->image='uploads/images/placeholder.png';
        }
        $product->category_id=$request->product_category_id;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with("success_message", "Produktas sėkmingai ištrintas");
    }
}
