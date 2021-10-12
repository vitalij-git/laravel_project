@extends('layouts.app')

@section('content')
<h1>Information about student</h1>
<p>{{$student->ID}}</p>
<p>{{$student->name}}</p>
<p>{{$student->surname}}</p>
<p>{{$student->group_id}}</p>
<p><td><img src="{{$student->image_url}}" alt="{{$student->name}}"  width="600px"/></td></p>
<a href="{{route('student.index')}}" class="btn btn-primary">Back</a>
@endsection
