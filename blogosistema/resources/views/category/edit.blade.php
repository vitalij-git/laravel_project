@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', [$category]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="category_title" type="text" class="form-control @error('category_title') is-invalid @enderror" name="category_title" value="{{$category->title }}" required  autofocus>

                                @error('category_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="category_description" type="text" class="form-control summernote @error('category_description') is-invalid @enderror" name="category_description"  required  autofocus>
                                    {{$category->description }}
                                </textarea>
                                @error('category_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-check col-md-4 col-form-label text-md-right">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="category_visible" value="1" @if($category->visible == 1) checked @endif>
                                <label class="form-check-label " for="flexCheckDefault">
                                    Visible
                                </label>

                              </div>
                          </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route('category.index')}}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                         $('.summernote').summernote();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
