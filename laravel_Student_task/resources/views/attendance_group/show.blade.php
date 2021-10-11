@extends('layouts.app')

@section('content')
<h1>Information about Group</h1>
<p>{{$attendance_group->ID}}</p>
<p>{{$attendance_group->name}}</p>
<p>{{$attendance_group->description}}</p>
<p>{{$attendance_group->difficulty}}</p>
<p>{{$attendance_group->school_id}}</p>
<p><img src="{{ asset($attendance_group->logo) }}" /></p>
<a href="{{route('attendance_group.index')}}" class="btn btn-primary">Back</a>
@endsection
