<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use App\Author;
use PDF;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterBooks = Book::all();
       $authors=Author::all();
       $bookTitleFilter = $request->bookTitleFilter;
       $bookAuthorFilter =$request->bookAuthorFilter;
       if($bookAuthorFilter){
        $books= Book::query()->sortable()->where('author_id', $bookAuthorFilter)->paginate(5);
       }
       else if($bookTitleFilter){
        $books= Book::sortable()->where('title', $bookTitleFilter)->paginate(5);
       }else{
        $books= Book::sortable()->paginate(10);
       }


       return view("book.index", ["books"=>$books,  "authors"=>$authors, "filterBooks" => $filterBooks]);
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

   public function generateStatisticsPDF()
    {
        $books = Book::all();
        $authors = Author::all();

        $booksCount=$books->count();
        $authorsCount=$authors->count();
        view()->share(['booksCount'=> $booksCount,'authorsCount'=>$authorsCount]);
        $pdf = PDF::loadView("book.statistics");
        return $pdf->download("statistics.pdf");
    }
}
