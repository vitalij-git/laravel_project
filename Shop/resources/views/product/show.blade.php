@extends('layouts.app')

@section('content')
    <h1>{{$product->title}}</h1>
    <h3>{{ $product->categoryID->title}}</h3>
    <h4>{{ $product->price}}</h4>
    <p>{!!$product->excerpt!!}</p>
    <p>{!! $product->description!!}</p>

    <div>
        <img src="{{$product->image}}" alt="{{$product->image}}">
    </div>

    <a href="{{route('product.index')}}" class="btn btn-secondary">{{ __('Back') }}</a>


@endsection
