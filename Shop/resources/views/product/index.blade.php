<style>
    .btn-filter{
        margin: 10px;
    }
</style>
@extends('layouts.app')

@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary">{{_('Add product')}}</a>
    <form action="{{route('product.index')}}" method="GET">
            <div>
                <label for="product_category" class="col-md-4 col-form-label ">{{ __('Category') }}</label>
                <div class="col-md-3">
                    <select class="form-control"  name="product_category">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        <option value="">All</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="product_min_price" class="col-md-4 col-form-label ">{{ __('Minumum price:') }}</label>
                <div class="col-md-3">
                    <input id="product_min_price" type="text" class="form-control"  name="product_min_price" >
                </div>
            </div>
            <div>
                <label for="product_max_price" class="col-md-4 col-form-label ">{{ __('Maximum price:') }}</label>
                <div class="col-md-3">
                <input id="product_max_price" type="text" class="form-control"  name="product_max_price" >
                </div>
            </div>
            <button class="btn btn-primary btn-filter">Filter</button>
    </form>

        @if($readyPDF==1)
        <form action="{{route('product.pdf')}}" method="POST">
            @csrf
            <input type="hidden" name="product_min_price" value="{{$filter_min_price}}" />
            <input type="hidden" name="product_max_price" value="{{$filter_max_price}}" />
            <input type="hidden" name="product_category" value="{{$filterCategory}}" />
            <button class="btn btn-primary btn-filter" name="generatePDF">Download PDF</button>
        </form>
        @endif

        <button class="btn btn-primary" id="show-button">Add product</button>

        <div class="productsfields d-none">

            <div class="productfield">
                <div class="form-group row">
                    <label for="product_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="product_title" type="text" class="form-control @error('product_title') is-invalid @enderror" name="product_title" value="{{ old('product_title') }}" required  autofocus>

                        @error('product_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_excerpt" class="col-md-4 col-form-label text-md-right">{{ __('Excerpt') }}</label>

                    <div class="col-md-6">
                        <textarea id="product_excerpt" type="text" class="form-control summernote @error('product_excerpt') is-invalid @enderror" name="product_excerpt"  required  autofocus>
                            {{ old('product_excerpt') }}
                        </textarea>
                        @error('product_excerpt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="product_description" type="text" class="form-control summernote @error('product_description') is-invalid @enderror" name="product_descripton"  required  autofocus>
                            {{ old('product_description') }}
                        </textarea>
                        @error('product_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select class="form-control @error('product_category_id') is-invalid @enderror"  name="product_category_id" id="product_category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="product_price" type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" value="{{ old('product_price') }}" required  autofocus>

                        @error('product_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" >

                        @error('product_mage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" name="AddClientsJS" class="btn btn-primary button" id="add-button" >Add</button>
            </div>

        </div>
        <table class="table table-striped">

            <tr>
                <td> @sortablelink('id', 'ID') </td>
                <td> @sortablelink('title', 'Title') </td>
                <td> @sortablelink('price', 'Price') </td>
                <td> {{_('Image')}}</td>
                <td> @sortablelink('category_id', 'Category') </td>
                <td>{{_('Actions')}} </td>
            </tr>

            @foreach ($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->title}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->image}} </td>
                    <td> {{$product->categoryID->title}} </td>
                    <td>
                        <a href="{{route('product.edit',[$product])}}" class="btn btn-secondary">{{_('Edit')}}</a>
                        <a href="{{route('product.show',[$product])}}" class="btn btn-primary">{{_('Show')}}</a>
                        <form method="post" action="{{route('product.destroy', [$product])}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </table>

    {!! $products->appends(Request::except('page'))->render() !!}

    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $("#show-button").on('click', function(){
                $('.productsfields').toggleClass('d-none');
            });
            $.ajaxSetup({
                    headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                 });
            $("#add-button").on('click', function(){
                var product_title = $('#product_title').val();
                var product_excerpt = $('#product_excerpt').val();
                var product_description = $('#product_description').val();
                var product_category_id = $('#product_category_id').val();
                var product_price = $('#product_price').val();
                //var product_image = $('#product_image').val();

                $.ajax({
                    type: 'POST',
                    url: "{{route('product.store')}}",
                    data: {product_title:product_title, product_excerpt:product_excerpt, product_description:product_description, product_price:product_price, product_category_id:product_category_id  },
                    success: function(data){
                        alert(data.success)
                        $('.productsfields').toggleClass('d-none');
                    }
                });
            });
        });

    </script>

@endsection
