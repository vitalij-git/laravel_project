@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', [$post]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{$post->title }}" required  autofocus>

                                @error('post_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="post_description" type="text" class="form-control summernote @error('post_description') is-invalid @enderror" name="post_description"  required  autofocus>
                                    {{$post->description }}
                                </textarea>
                                @error('post_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="post_content" type="text" class="form-control summernote @error('post_content') is-invalid @enderror" name="post_content"  required  autofocus>
                                    {{$post->description }}
                                </textarea>
                                @error('post_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('post_category_id') is-invalid @enderror"  name="post_category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"@if($category->id == $post->category_id) selected @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('post_shop_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route('post.index')}}" class="btn btn-secondary">Back</a>
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
