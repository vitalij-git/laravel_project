@extends('layouts.app')

@section('content')
<form action="{{route('attendance_group.update', [$attendance_group])}}" method="POST">
    Name: <input type="text" name="attendance_group_name" placeholder="Enter attendance_group name" value="{{$attendance_group->name}}" />
    Description: <input type="text" name="attendance_group_description" placeholder="Enter attendance_group description" value="{{$attendance_group->description}}" />
    Difficulty: <input type="number" name="attendance_group_difficulty" placeholder="Enter attendance_group place" value="{{$attendance_group->difficulty}}" />
    School: <input type="text" name="attendance_group_school_id" placeholder="Enter attendance_group school" value="{{$attendance_group->school_id}}" />
    @csrf
    <button type="submit">Edit </button>
</form>
@endsection
