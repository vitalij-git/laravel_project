@extends('layouts.app')

@section('content')

<form action="{{route('paginationsetting.update', [$pagination])}}" method="POST">
    <div class="mb-3">
        <label for="pagination_title" class="form-label">Title</label>
        <input type="text" class="form-control  @error('pagination_title') is-invalid @enderror" name="pagination_title" @if (old('pagination_title')) value="{{ old('pagination_title') }}" @else  value="{{$pagination->title}}" @endif>
        @error('pagination_title')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
    </div>
      <div class="mb-3">
        <label for="pagination_value" class="form-label">Value</label>
        <input type="number" class="form-control  @error('pagination_value') is-invalid @enderror"  name="pagination_value" @if (old('pagination_value')) value="{{ old('pagination_value') }}" @else  value="{{$pagination->value}}" @endif>
        @error('pagination_value')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
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
