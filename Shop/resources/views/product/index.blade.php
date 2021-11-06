@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('author.create')}}" class="btn btn-primary">{{_('Create Author')}}</a>
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

    {!! $categories->appends(Request::except('page'))->render() !!}
</div>


@endsection
