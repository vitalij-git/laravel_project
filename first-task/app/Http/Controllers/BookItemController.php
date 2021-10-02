<?php

namespace App\Http\Controllers;

use App\book_item;
use Illuminate\Http\Request;

class BookItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_items = book_item::all();
        return view("book_items.index",['book_items' => $book_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book_item = new Book_item();


        $book_item->title = $request->book_title;
        $book_item->book_code = $request->book_code;
        $book_item->pages = $request->book_pages;
        $book_item->description = $request->book_description;
        $book_item->author_id = $request->book_author_id;

        $book_item->save();

        return redirect()->route('book_items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book_item  $book_item
     * @return \Illuminate\Http\Response
     */
    public function show(book_item $book_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book_item  $book_item
     * @return \Illuminate\Http\Response
     */
    public function edit(book_item $book_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book_item  $book_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book_item $book_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book_item  $book_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(book_item $book_item)
    {
        //
    }
}
