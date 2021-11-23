@extends('layouts.app')

@section('content')
<style>
    .button-action{
        display: flex;
    }
    .button-action button,a{
        margin:10px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf

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
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="category_visible">
                                <label class="form-check-label " for="flexCheckDefault">
                                    Visible
                                </label>

                              </div>
                          </div>
                          <div class="col-md-4">
                            <input type="checkbox" id="newPost" name="newPost"  />
                            <span>Add new post</span>
                        </div>
                        <div class="d-none post-fields">
                            <div class="more-post-fields">
                                <div class="form-group row">
                                    <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                    <div class="col-md-6">
                                        <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title[]" value="{{ old('post_title') }}"  >
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
                                        <textarea id="post_description" type="text" class="form-control summernote @error('post_description') is-invalid @enderror" name="post_description[]"  >
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
                                        <textarea id="post_content" type="text" class="form-control summernote @error('post_content') is-invalid @enderror" name="post_content[]"  >
                                            {{ old('post_content') }}
                                        </textarea>
                                        @error('post_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="button-action">
                                    <a type="button" id="add-more-post-fields" class="btn btn-success">Add More</a>

                                    <div class="remove-button d-none">
                                        <a type="button" class="btn btn-danger" id="remove-last-post">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                                <a href="{{route('category.index')}}" class="btn btn-secondary">{{ __('back') }}</a>
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
        $("#newPost").click(function(){
            $('.post-fields').toggleClass('d-none');
        });
        $("#add-more-post-fields").click(function(){
            $('.post-fields').append($('.more-post-fields').html());
            $('.remove-button').toggleClass('d-none');
        });
        $(document).on("click", "#remove-last-post", function() {
            $(this).parents('.more-post-fields').remove();
        });
    });
</script>
@endsection
