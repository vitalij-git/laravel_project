<?php

namespace App\Http\Controllers;

use App\PaginationSetting;
use Carbon\Carbon;
use App\task;
use App\Type;
use App\Owner;
use Illuminate\Http\Request;
use PDF;

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
        $owner=Owner::all();
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
        }
        else if($request->type_filter){

            $type_filter = $request->type_filter;

             $task= Task::query()->sortable()->where('type_id', $type_filter)->paginate($pagination);
        }
         else {
            $task=Task::orderBy( $collumnName, $sortby)->paginate($pagination);
        }


        // $task=Task::orderBy( $collumnName, $sortby)->paginate($pagination);
        return view('task.index', ['tasks'=>$task, 'types'=>$types , 'collumnName' => $collumnName, 'sortby' => $sortby,
         'type_sort'=>$type_sort, 'pages'=>$pages, "defaultLimit"=> $pagination, "owners"=>$owner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type=Type::all();
        $owner=Owner::all();
        return view('task.create', ['types'=>$type, "owners"=>$owner]);
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

        $request->validate([
            'task_title'=>'required|between:6,225|regex:/^[a-zA-Z]+$/u',
            'task_description'=>'required|max:1500',
            'task_start_date' => 'required|date',
            'task_end_date' => 'required|date|after:task_start_date',
            'task_type_id'=>'required|integer',
            'task_owner_id'=>'required|integer'

        ]);
        $task->title = $request->task_title;
        $task->description=$request->task_description;
        $task->type_id= $request->task_type_id;
        $task->start_date=$request->task_start_date;
        $task->end_date=$request->task_end_date;
        $task->owner_id=$request->task_owner_id;

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
        $owner=Owner::all();
        return view('task.edit', ['task'=>$task,'types'=>$type, "owners"=>$owner]);
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
        $task->owner_id=$request->task_owner_id;
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
    public function generatePDF() {


        $task = Task::all();

        view()->share('tasks', $task);

        $pdf = PDF::loadView("task.pdf_template", $task);

        return $pdf->download("task.pdf");
    }
    public function generateTaskPDF(Task $task) {


        view()->share('task', $task);

        $pdf = PDF::loadView("task.pdf_task_template", $task);

        return $pdf->download("task".$task->id.".pdf");
    }
    public function generateStatisticsPDF()
    {
        $tasks = Task::all();
        $owners = Owner::all();
        $types = Type::all();
        view()->share(['tasks'=> $tasks,'types'=>$types, "owners"=>$owners]);
        $pdf = PDF::loadView("task.statistics");
        return $pdf->download("statistics.pdf");

    }
}
