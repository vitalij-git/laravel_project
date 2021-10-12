@extends('layouts.app')

@section('content')
<div class="content">
    <form action="{{route('student.update', [$student])}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="student_name" class="form-control"  value="{{$student->name}}" />
        </div>
        <div class="mb-3">
            <label  class="form-label">Surname</label>
            <input type="text" name="student_surname" class="form-control"  value="{{$student->surname}}"  />
        </div>
        <div class="mb-3">
            <label  class="form-label">Group</label>
            <input type="number" class="form-control" name="student_group_id" value="{{$student->group_id}}" />
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" class="form-control" name="student_image_url"  />
        <br>
            <img src="{{$student->image_url}}" alt="">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">edit</button>
        <a href="{{route('student.index')}}" class="btn btn-primary">Back</a>
    </form>

</div>
@endsection
