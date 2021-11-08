@extends('layouts.app')

@section('content')

    <a href="{{route('category.create')}}" class="btn btn-primary">{{_('Create category')}}</a>
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


@endsection
