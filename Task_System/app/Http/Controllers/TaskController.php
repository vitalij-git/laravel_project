<?php

namespace App\Http\Controllers;

use App\PaginationSetting;
use Carbon\Carbon;
use App\task;
use App\Type;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = PaginationSetting::all()->sortBy("title",SORT_REGULAR, false);;
        $types=Type::all();
        $collumnName = $request->collumnname;
        $sortby = $request->sortby;
        $type_sort=$request->type_sort;

        $pagination=$request->pagination;

        if(!$collumnName && !$sortby ) {
            $collumnName = 'id';
            $sortby = 'asc';
        }
        if(!$pagination){
            $pagination=30;
        }

        if($pagination == 1) {

        $task=Task::orderBy( $collumnName, $sortby)->get();
        } else {
            $task=Task::orderBy( $collumnName, $sortby)->paginate($pagination);
        }


        // $task=Task::orderBy( $collumnName, $sortby)->paginate($pagination);
        return view('task.index', ['tasks'=>$task, 'types'=>$types , 'collumnName' => $collumnName, 'sortby' => $sortby,
         'type_sort'=>$type_sort, 'pages'=>$pages, "defaultLimit"=> $pagination]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=Type::all();
        return view('task.create', ['types'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        $task->title = $request->task_title;
        $task->description=$request->task_description;
        $task->type_id= $request->task_type_id;
        $task->start_date=$request->task_start_date;
        $task->end_date=$request->task_end_date;

        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {

        return view('task.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        $type =Type::all()->sortBy("title",SORT_REGULAR, true);
        return view('task.edit', ['task'=>$task,'types'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {


        $task->title = $request->task_title;
        $task->description=$request->task_description;
        $task->type_id= $request->task_type_id;
        $task->start_date=$request->task_start_date;
        $task->end_date=$request->task_end_date;
        $task->save();
        return redirect()->route('task.index', );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();
         return redirect()->route('task.index')->with('success_message', 'Tipas ištrintas sėkmingai');
    }
    public function search(Request $request) {


        $search = $request->search;

        $task = Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view("task.search",['tasks'=> $task]);
    }
}
