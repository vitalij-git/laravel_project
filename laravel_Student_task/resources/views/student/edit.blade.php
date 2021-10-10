@extends('layouts.app')

@section('content')
<div class="content">
    <form action="{{route('student.store')}}" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="student_name" class="form-control" placeholder="Enter student name" value="{{$student->name}}" />
        </div>
        <div class="mb-3">
            <label  class="form-label">Surname</label>
            <input type="text" name="school_description" class="student_surname" placeholder="Enter student surname" value="{{$student->surname}}"  />
        </div>
        <div class="mb-3">
            <label  class="form-label">Group</label>
            <input type="number"  class="form-control" name="student_group_id" placeholder="Enter student group id" value="{{$student->group_id}}" />
        </div>
        <div class="mb-3">
            <label  class="form-label">Link</label>
            <input type="text" class="form-control" name="student_image_url" placeholder="Enter student image link" value="{{$student->image_url}}" />
        </div>
        @csrf
        <button type="submit" class="btn btn_primary">Create new </button>
        <a href="{{route('student.index')}}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection
