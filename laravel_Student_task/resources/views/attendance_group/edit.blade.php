@extends('layouts.app')

@section('content')
<div class="content">
    <form action="{{route('attendance_group.store')}}" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="attendance_group_name" class="form-control" placeholder="Enter group name" value="{{$attendance_group->name}}"  />
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" name="attendance_group_description" class="form-control" placeholder="Enter group description" value="{{$attendance_group->description}}" />
        </div>
        <div class="mb-3">
            <label  class="form-label">Difficulty</label>
            <input type="text"  class="form-control" name="attendance_group_difficulty" placeholder="Enter group difficulty" value="{{$attendance_group->difficulty}}"/>
        </div>
        <div class="mb-3">
            <label  class="form-label">School</label>
            <input type="number" class="form-control" name="ttendance_group_school_id" placeholder="Enter group school" value="{{$attendance_group->school_id}}"/>
        </div>
        @csrf
        <button type="submit" class="btn btn_primary">Create new </button>
        <a href="{{route('attendance_group.store')}}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection
