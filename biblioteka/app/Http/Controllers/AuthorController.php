<?php

namespace App\Http\Controllers;

use App\author;
use App\Author as AppAuthor;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors=Author::sortable()->paginate(10);

        return view("author.index", ["authors"=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("author.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $author= new Author;
       $author->name=$request->author_name;
       $author->surname=$request->author_surname;
       $author->save();
       return redirect()->route("author.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        return view("author.edit", ["author"=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, author $author)
    {
        $author->name=$request->author_name;
        $author->name=$request->author_surname;
        $author->save();
        return redirect()->route("author.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        $author_count=$author->authorBooks->count();

        if($author_count==0){
            $author->delete();
            return redirect()->route("author.index")->with('success_message', 'autorius ištrinta sėkmingai');
        }
        return redirect()->route("author.index")->with('error_message', 'autorius turi knygu');
    }

}
