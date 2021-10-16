
@extends('layouts.app')

@section('content')
    <form action="{{route('type.store')}}" method="POST">
        <div class="mb-3">
            <label for="type_title" class="form-label">type title</label>
            <input type="text" class="form-control" name="type_title" placeholder="Enter a type title">
          </div>
          <div class="mb-3">
            <label for="type_description" class="form-label">Enter a type description</label>
            <textarea class="form-control summernote" name="type_description" rows="5"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('type.index')}}" class="btn btn-primary">Back</a>
    </form>
    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection


