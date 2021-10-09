
@extends('layouts.app')

@section('content')
<form action="{{route('school.update', [$school])}}" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="school_name" class="form-control" placeholder="Enter school name" value="{{$school->name}}" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Description</label>
        <input type="text" name="school_description" class="form-control" placeholder="Enter school description" value="{{$school->description}}" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Place</label>
        <input type="text"  class="form-control" name="school_place" placeholder="Enter school place" value="{{$school->place}}" />
    </div>
    <div class="mb-3">
        <label  class="form-label">Phone</label>
        <input type="number" class="form-control" name="school_phone" placeholder="Enter school phone" value="{{$school->phone}}" />
    </div>
    @csrf
    <button type="submit" class="btn btn-primary">Edit </button>
    <a href="{{route('school.index')}}" class="btn btn-primary">Back</a>
</form>
@endsection
