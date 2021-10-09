@extends('layouts.app')

@section('content')
<h1>Information about student</h1>
<p>{{$student->ID}}</p>
<p>{{$student->name}}</p>
<p>{{$student->surname}}</p>
<p>{{$student->group_id}}</p>
<p>{{$student->image_url}}</p>
@endsection
