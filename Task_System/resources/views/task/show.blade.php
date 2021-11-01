@extends('layouts.app')

@section('content')
<h1>Information about Task</h1>
<p>{{$task->title}}</p>
<p>{!! $task->description !!}</p>
<p>{{$task->typeTask->title}}</p>

<a href="{{route('task.pdftask', [$task])}}" class="btn btn-primary">Export Task PDF</a>
<a href="{{route('task.index')}}" class="btn btn-primary">Back</a>

@endsection
