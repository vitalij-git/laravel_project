@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}" required  autofocus>

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
                                    {{ old('post_description') }}
                                </textarea>
                                @error('post_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <textarea id="post_content" type="text" class="form-control summernote @error('post_content') is-invalid @enderror" name="post_content"  required  autofocus>
                                    {{ old('post_content') }}
                                </textarea>
                                @error('post_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row category-fields">
                            <label for="post_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('post_category_id') is-invalid @enderror"  name="post_category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('post_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="formFile" class="col-md-4 col-form-label text-md-right">file input </label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                          </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                                <a href="{{route('post.index')}}" class="btn btn-secondary">{{ __('back') }}</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="newCategory" name="newCategory" value="1"  />
                            <span>Add new Category</span>
                        </div>
                        <div class="category-fields d-none">
                            <div class="form-group row">
                                <label for="category_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="category_title" type="text" class="form-control @error('category_title') is-invalid @enderror" name="category_title" value="{{ old('category_title') }}" >

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
                                    <textarea id="category_description" type="text" class="form-control summernote @error('category_description') is-invalid @enderror" name="category_description" >
                                        {{ old('category_description') }}
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
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="category_visible" value='1'>
                                    <label class="form-check-label " for="flexCheckDefault">
                                        Visible
                                    </label>

                                  </div>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
     $('.summernote').summernote();
     $("#newCategory").click(function(){
            $('.category-fields').toggleClass('d-none');
        });
    });
</script>
@endsection
