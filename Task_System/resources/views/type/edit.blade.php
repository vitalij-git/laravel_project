
@extends('layouts.app')

@section('content')

    <form action="{{route('type.update', [$type])}}" method="POST">
        <div class="mb-3">
            <label for="type_title" class="form-label">{{_('Title')}}</label>
            <input type="text" class="form-control  @error('type_title') is-invalid @enderror " value="{{ old('type_title') }}" name="type_title" value="{{$type->title}}" >
            @error('type_title')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <div class="mb-3">
            <label for="type_description" class="form-label">{{_('Description')}}</label>
            <textarea class="form-control summernote  @error('type_description') is-invalid @enderror " value="{{ old('type_description') }}"  name="type_description" >{{$type->description}}</textarea>
            @error('type_description')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <button type="submit" class="btn btn-primary">{{_('Edit')}}</button>
          <a href="{{route('type.index')}}" class="btn btn-secondary">{{_('back')}}</a>
    </form>

    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
