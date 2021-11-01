@extends('layouts.app')

@section('content')
<a href="{{route('task.create')}}" class="btn btn-primary create-btn" >Create</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif
<div class="top-action">
    <form action="{{route('task.search')}}" method="GET">
        @csrf
            <label for="search" >Search data</label>
            <input type="text" class="form-control-sm" name="search" id="search" placeholder="Enter search key" />
            <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <form action="{{route('task.index')}}" method="GET">
        @csrf
        <select name="collumnname" class="form-control-sm" aria-label=".form-select-lg example">

            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
            @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'type_id')
                <option value="type_id" selected>Type</option>
            @else
                <option value="type_id">Type</option>
            @endif

        </select>

        <select name="sortby" class="form-control-sm">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button type="submit" class="btn btn-primary">SORT</button>

    </form>
    <form action="{{route('task.index')}}" method="GET">
            <select class="form-control-sm" name="type_sort">
               @foreach ($types as $type)
               <option value="{{$type->title}}" >{{$type->title}}</option>
               @endforeach
           </select>
           <button type="submit" class="btn btn-primary" name="typeSort">Type sort</button>
    </form>
    <form action="{{route('task.index')}}" method="GET">
        @csrf

            <label for="">Show tasks in page</label>
            <select name="pagination" class="form-control-sm">
                @foreach ($pages as $page)
                    @if($page->visible==1)
                    <option value="{{$page->value}}"  @if($defaultLimit == $page->value) selected @endif>{{$page->title}}</option>
                    @endif
                @endforeach
            </select>
                <button type="submit" class="btn btn-primary">Set</button>


    </form>
</div>
<a class="btn btn-primary" href="{{route('task.pdf')}}"> Export tasks table to PDF </a>
<form action="{{route('task.statistics')}}" method="GET">
    <button type="submit" class="btn btn-secondary">Export statistics to PDF</button>
</form>
<table class="table table-stripped">
            <tr>
                <th>
                    {{_('ID')}}
                </th>
                <th>
                    {{_('title')}}
                </th>
                <th>
                    {{_('Owner')}}
                </th>
                <th>
                    {{_('Type')}}
                </th>
                <th>
                    {{_('Start  date')}}
                </th>
                <th>
                    {{_('End date')}}
                </th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Show')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
            </tr>
            @foreach ($tasks as $task)
                    <tr>
                        <td>
                            {{$task->id}}
                        </td>
                        <td>
                            {{$task->title}}
                        </td>
                        <td>
                            {{$task->ownerTask->name}}
                            {{$task->ownerTask->surname}}
                        </td>
                        <td>
                            {{$task->typeTask->title}}
                        </td>
                        <td>
                            {{$task->start_date}}
                        </td>
                        <td>
                            {{$task->end_date}}
                        </td>
                        <td>
                            <a href="{{route('task.edit',[$task])}}" class="btn btn-primary">{{_('Edit')}}</a>
                        </td>
                        <td>
                            <a href="{{route('task.show',[$task])}}" class="btn btn-primary"> {{_('Show')}}</a>
                        </td>
                        <td>
                            <a href="{{route('task.destroy',[$task])}}" class="btn btn-danger">{{_('Delete')}}</a>
                        </td>
                    </tr>
            @endforeach
    </table>
    @if ($defaultLimit !=1 )
        {!! $tasks->appends(Request::except('page'))->render() !!}
    @endif
@endsection
