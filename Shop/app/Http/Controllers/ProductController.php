<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use PDF;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $category=$request->product_category;
        $min_price=$request->product_min_price;
        $max_price=$request->product_max_price;
        $readyPDF=0;
        if($category && $min_price && $max_price)
        {

            $products=Product::sortable()->where('category_id',  $category )->whereBetween('price', [$min_price, $max_price])->paginate(10);
            $readyPDF=1;
        }
        else if(!$category && $min_price && $max_price)
        {

            $products=Product::sortable()->whereBetween('price', [$min_price, $max_price])->paginate(20);
            $readyPDF=1;
        }
        else if($category && !$min_price && !$max_price)
        {

            $products=Product::sortable()->where('category_id',  $category )->paginate(30);
            $readyPDF=1;
        }
        else{
            $products=Product::sortable()->paginate(50);
        }
        if($request->generatePDF){
            // view()->share(['products'=>$products]);
            $pdf = PDF::loadView("product.filepdf.pdf");
            return $pdf->download("products.pdf");
        }
        $categories=Category::all();
        return view('product.index', ['products'=>$products, 'categories'=>$categories, 'readyPDF'=>$readyPDF]);
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
        $request->validate([
            'product_title'=>'required|between:6,225|regex:/^[a-zA-Z]+$/u',
            'product_description'=>'required|max:1500',
            'product_excerpt' => 'required|max:600',
            'product_price' => 'required|numeric',
            'product_category_id'=>'required|integer',
            'product_iamge'=>'file|max:2048'
        ]);
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
        $request->validate([
            'product_title'=>'required|between:6,225|regex:/^[a-zA-Z]+$/u',
            'product_description'=>'required|max:1500',
            'product_excerpt' => 'required|max:600',
            'product_price' => 'required|numeric|regex:^(?:[1-9]\d+|\d)(?:\,\d\d)?$',
            'product_category_id'=>'required|integer',
            'product_iamge'=>'file|max:2048'
        ]);
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
    public function generatePDF() {

       //Product::index()->$products;
       //Product::all()->index()->$products;
       //index();

         $products = Product::all();

        view()->share('products',$products);
        $pdf = PDF::loadView("filepdf", $products);

        return $pdf->download("products.pdf");
    }
}
