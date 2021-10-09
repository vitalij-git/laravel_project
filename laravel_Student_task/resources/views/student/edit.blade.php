@extends('layouts.app')

@section('content')
<form action="{{route('student.update', [$student])}}" method="POST">
    Name: <input type="text" name="student_name" placeholder="Enter student name" value="{{$student->name}}" />
    Surname: <input type="text" name="student_surname" placeholder="Enter student surname" value="{{$student->surname}}" />
    Group: <input type="number" name="student_group_id" placeholder="Enter student group id" value="{{$student->group_id}}" />
    Url: <input type="text" name="student_image_url" placeholder="Enter student image url" value="{{$student->image_url}}" />
    @csrf
    <button type="submit">Edit </button>
</form>
@endsection
