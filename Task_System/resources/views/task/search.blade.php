@extends('layouts.app')

@section('content')


    <form action="{{route('task.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button type="submit">Search</button>
    </form>

    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('description', 'Description')</th>
            <th>@sortablelink('type_id', 'Type')</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td> {{$task->id }}</td>
                <td> {{$task->title }}</td>
                <td> {!!$task->description !!}</td>
                <td> {{$task->typeTask->title }}</td>
            </tr>
        @endforeach
    </table>

    {!! $tasks->appends(Request::except('page'))->render() !!}
    <a href="{{route('task.index')}}" class="btn btn-secondary">Back</a>

@endsection
