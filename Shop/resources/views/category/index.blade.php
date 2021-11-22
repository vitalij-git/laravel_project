@extends('layouts.app')

@section('content')

    <a href="{{route('category.create')}}" class="btn btn-primary">{{_('Create category')}}</a>
    <button class="btn btn-primary" id="show-button">Add category</button>
    <div class="category-fields d-none">
        <div class="form-group row">
            <label for="category_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
            <div class="col-md-6">
                <input id="category_title" type="text" class="form-control @error('category_title') is-invalid @enderror" name="category_title" value="{{ old('category_title') }}" required  autofocus>
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
            <label for="category_shop_id" class="col-md-4 col-form-label text-md-right">{{ __('Shop') }}</label>
            <div class="col-md-6">
                <select id="category_shop_id" class="form-control @error('category_shop_id') is-invalid @enderror"  name="category_shop_id">
                    @foreach ($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->title}}</option>
                    @endforeach
                </select>
                @error('category_shop_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" id="add-button">Add</button>
    </div>
    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td> @sortablelink('shop_id', 'Shop') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($categories as $category)
            <tr>
                <td> {{$category->id}} </td>
                <td> {{$category->title}} </td>
                <td> {{$category->description}} </td>
                <td> {{$category->shopID->title}} </td>
                <td>
                    <a href="{{route('category.edit',[$category])}}" class="btn btn-secondary">{{_('Edit')}}</a>
                    <form method="post" action="{{route('category.destroy', [$category])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $categories->appends(Request::except('page'))->render() !!}</div>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $("#show-button").on('click', function(){
                $('.category-fields').toggleClass('d-none');
            });
            $.ajaxSetup({
                    headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                 });
            $("#add-button").on('click', function(){
                var category_title = $('#category_title').val();
                var category_shop_id = $('#category_shop_id').val();
                var category_description = $('#category_description').val();
                //var product_image = $('#product_image').val();
                console.log(category_description);
                $.ajax({
                    type: 'POST',
                    url: "{{route('category.store')}}",
                    data: {category_title:category_title, category_shop_id:category_shop_id, category_description:category_description  },
                    success: function(data){
                        alert(data.error)
                        $('.category-fields').toggleClass('d-none');
                    }
                });
            });
        });

    </script>
@endsection
