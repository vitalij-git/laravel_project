@extends('layouts.app')

@section('content')
<h1>Information about Task</h1>
<p>{{$book->title}}</p>
<p>{{$book->isbn}}</p>
<p>{!! $book->about!!}</p>
<p>{{$book->pages}}</p>
<p>{{$book->authorBook->name}}{{$book->authorBook->surname}}</p>


<a href="{{route('book.index')}}" class="btn btn-primary">Back</a>

@endsection
