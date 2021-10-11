@extends('layouts.app')

@section('content')
<h1>Information about school</h1>
<p>{{$school->ID}}</p>
<p>{{$school->name}}</p>
<p>{{$school->description}}</p>
<p>{{$school->place}}</p>
<p>{{$school->phone}}</p>
<p><img src="{{ asset($school->logo) }}" /></p>
<a href="{{route('school.index')}}" class="btn btn-primary">Back</a>
@endsection
