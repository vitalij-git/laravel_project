@extends('layouts.app')

@section('content')

    <form action="{{route('paginationsetting.store')}}" method="POST">
        <div class="mb-3">
            <label for="pagination_title" class="form-label">Title</label>
            <input type="text" class="form-control @error('pagination_title') is-invalid @enderror " value="{{ old('pagination_title') }}" name="pagination_title" >
            @error('pagination_title')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
        </div>
          <div class="mb-3">
            <label for="pagination_value" class="form-label">Value</label>
            <input type="number" class="form-control  @error('pagination_value') is-invalid @enderror" value="{{ old('pagination_value') }}" name="pagination_value" >
            @error('pagination_value')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="pagination_visible">
                <label class="form-check-label" for="flexCheckDefault">
                    Visible
                </label>

              </div>
          </div>
        @csrf
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{route('paginationsetting.index')}}" class="btn btn-secondary">Back</a>
    </form>


@endsection
