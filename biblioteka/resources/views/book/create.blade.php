@extends('layouts.app')

@section('content')
    <form action="{{route('book.store')}}" method="POST">
        <div class="mb-3">
            <label for="book_title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control @error('book_title') is-invalid @enderror"  name="book_title" placeholder="">
        </div>
        <div class="mb-3">
            <label for="book_isbn" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control @error('book_isbn') is-invalid @enderror"  name="book_isbn" placeholder="">
        </div>
          <div class="mb-3">
            <label for="book_about" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control summernote @error('book_about') is-invalid @enderror"  name="book_about" ></textarea>
          </div>
          <div class="mb-3">
            <label for="book_pages" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control @error('book_pages') is-invalid @enderror"  name="book_pages" placeholder="">
        </div>
          <div class="form-group row">
            <label for="book_author_id" class="form-label">{{ __('Type') }}</label>
            <div class="col-md-6">
                 <select class="form-control @error('book_author_id') is-invalid @enderror"  name="book_author_id">
                    @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}{{$author->surname}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @csrf
          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
          <a href="{{route('book.index')}}" class="btn btn-secondary">{{ __('Back') }}</a>
    </form>

    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
