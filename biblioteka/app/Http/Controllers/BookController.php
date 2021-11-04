<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use App\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $books =Book::all();
       $authors=Author::all();
       $collumnName = $request->collumnname;
       $sortby = $request->sortby;
       if(!$collumnName && !$sortby ) {
           $collumnName = 'id';
           $sortby = 'asc';
       }
       if($request->author_filter){
        $author_filter = $request->author_filter;
        echo $author_filter;
        $books= Book::query()->sortable()->where('author_id', $author_filter)->paginate(5);
       }else{
        $books= Book::orderBy( $collumnName, $sortby)->paginate(10);
       }


       return view("book.index", ["books"=>$books, "collumnName"=> $collumnName, "sortby"=>$sortby, "authors"=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $authors=Author::all();
        return view("book.create", ["authors"=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book= new Book;
       $book->title=$request->book_title;
       $book->isbn=$request->book_isbn;
       $book->about=$request->book_about;
       $book->pages=$request->book_pages;
       $book->author_id=$request->book_author_id;
       $book->save();
       return redirect()->route("author.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view("book.show", ["book"=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $authors=Author::all();

        return view("book.edit", ["book"=>$book,"authors"=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $book->title=$request->book_title;
       $book->isbn=$request->book_isbn;
       $book->about=$request->book_about;
       $book->pages=$request->book_pages;
       $book->author_id=$request->book_author_id;
       $book->save();
       return redirect()->route("book.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route("book.index");
    }
}
