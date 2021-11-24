<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories=Category::sortable()->paginate(10);
       return view ('category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category;
        $category->title=$request->category_title;
        $category->description=$request->category_description;
        if($request->category_visible == 1){
            $category->visible=$request->category_visible;
        }
        else{
            $category->visible=0;
        }

        $category->save();
        $newPost= $request->newPost;
        if( $newPost =='on'){
            $postFieldsCount= count($request->post_title);
            for($i=0;$i<$postFieldsCount;$i++){
                $post =new Post;
                $post->title=$request->post_title[$i];
                $post->description=$request->post_description[$i];
                $post->content=$request->post_content[$i];
                $post->image='image';
                $post->category_id=$category->id;
                $post->save();
            }
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts=$category->hasManyPost();
        $postCount=$posts->count();


        return view('category.show', ['postCount'=>$postCount, 'category'=>$category, 'posts'=>$posts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title=$request->category_title;
        $category->description=$request->category_description;
        if($request->category_visible == 1){
            $category->visible=$request->category_visible;
        }
        else{
            $category->visible=0;
        }

        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
