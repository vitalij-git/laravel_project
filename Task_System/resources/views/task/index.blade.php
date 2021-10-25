@extends('layouts.app')

@section('content')
<a href="{{route('task.create')}}" class="btn btn-primary create-btn" >Create</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif
<form action="{{route('task.search')}}" method="GET">
    @csrf
    <input type="text" name="search" placeholder="Enter search key" />
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<form action="{{route('task.index')}}" method="GET">
    @csrf
    <select name="collumnname" class="form-select" aria-label=".form-select-lg example">

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

    <select name="sortby" class="form-select">
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
    <div class="col-md-6">
        <select class="form-control" name="type_sort">
           @foreach ($types as $type)
           <option value="{{$type->id}}" >{{$type->title}}</option>
           @endforeach
       </select>
       <button type="submit" class="btn btn-primary">Type sort</button>
   </div>

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
                            {{$task->typeTask->title}}
                        </td>
                        <td>
                            {{$task->start_date}}
                        </td>
                        <td>
                            {{$task->end_date}}
                        </td>
                        <td>
                            <a href="{{route('task.edit',[$task])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{route('task.show',[$task])}}" class="btn btn-primary">Show</a>
                        </td>
                        <td>
                            <a href="{{route('task.destroy',[$task])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            @endforeach
    </table>
    {!! $tasks->appends(Request::except('page'))->render() !!}
@endsection
