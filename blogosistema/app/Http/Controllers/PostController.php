<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::sortable()->paginate(10);

        return view('post.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('post.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post =new Post;
        $post->title=$request->post_title;
        $post->description=$request->post_description;
        $post->content=$request->post_content;

        $post->image="image";

        if($request->newCategory =="1" ){
            $category=new Category;
            $category->title=$request->category_title;
            $category->description=$request->category_description;
            $post->category_id=$category->id;
            if($request->category_visible == 1){
                $category->visible=$request->category_visible;
            }
            else{
                $category->visible=0;
            }
            $category->save();

        }

        $post->category_id=$request->categoryID;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories=Category::all();
        return view('post.show', ['post'=>$post, 'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('post.edit', ['post'=>$post, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->post_title;
        $post->description=$request->post_description;
        $post->content=$request->post_content;
        $post->category_id=$request->post_category_id;
        $post->image="image";


        $post->save();

        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect()->route('post.index');
    }
}
