@extends('layouts.app')

@section('content')

    <form action="{{route('type.store')}}" method="POST">
        <div class="mb-3">
            <label for="type_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="type_title" >
          </div>
          <div class="mb-3">
            <label for="type_description" class="form-label">Description</label>
            <textarea class="form-control summernote" name="type_description" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{route('type.index')}}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
