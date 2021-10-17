@extends('layouts.app')

@section('content')
    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="company_title" class="form-label">Company title</label>
            <input type="text" class="form-control" name="company_title" placeholder="Enter a company title">
          </div>
          <div class="mb-3">
            <label for="company_description" class="form-label">Enter a company description</label>
            <textarea class="form-control summernote" name="company_description" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label for="company_logo" class="form-label">Default file input example</label>
            <input class="form-control " type="file" name="company_logo">
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('company.index')}}" class="btn btn-primary">Back</a>
    </form>
    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
