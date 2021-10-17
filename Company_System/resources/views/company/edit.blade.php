@extends('layouts.app')

@section('content')
    <form action="{{route('company.update', [$company])}}" method="POST">
        <div class="mb-3">
            <label for="company_title" class="form-label">Company title</label>
            <input type="text" class="form-control" name="company_title" value="{{$company->title}}">
          </div>
          <div class="mb-3">
            <label for="company_description" class="form-label">description</label>
            <textarea class="form-control summernote" name="company_description" rows="5">{{$company->description}}</textarea>
          </div>
          <div class="mb-3">
            <label for="company_logo" class="form-label">Company logo</label>
            <input class="form-control " type="file" id="formFile" name="company_logo">
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href="{{route('company.index')}}" class="btn btn-primary">Back</a>

    </form>
    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
