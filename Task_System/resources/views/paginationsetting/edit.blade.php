@extends('layouts.app')

@section('content')

<form action="{{route('paginationsetting.update', [$pagination])}}" method="POST">
    <div class="mb-3">
        <label for="pagination_title" class="form-label">Title</label>
        <input type="text" class="form-control" name="pagination_title" value="{{$pagination->title}}">
      </div>
      <div class="mb-3">
        <label for="pagination_value" class="form-label">Value</label>
        <input type="number" class="form-control " name="pagination_value" value="{{$pagination->value}}">
      </div>
      <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="pagination_visible" @if($pagination->visible==1) checked @endif>
            <label class="form-check-label" for="flexCheckDefault">
                Visible
            </label>
          </div>
      </div>
    @csrf
      <button type="submit" class="btn btn-primary">Edit</button>
      <a href="{{route('paginationsetting.index')}}" class="btn btn-secondary">Back</a>
</form>

@endsection
