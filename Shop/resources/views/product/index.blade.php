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
                        <option value="{{$category->id}}" >{{$category->title}}</option>
                        @endforeach
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



@endsection
