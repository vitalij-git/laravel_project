@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('shop.create')}}" class="btn btn-primary">{{_('Create shop')}}</a>
    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td> @sortablelink('email', 'Email') </td>
            <td> @sortablelink('phone', 'Phone') </td>
            <td> @sortablelink('country', 'Country') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($shops as $shop)
            <tr>
                <td> {{$shop->id}} </td>
                <td> {{$shop->title}} </td>
                <td> {{$shop->description}} </td>
                <td> {{$shop->email}} </td>
                <td> {{$shop->phone}} </td>
                <td> {{$shop->country}} </td>
                <td>
                    <a href="{{route('shop.edit',[$shop])}}" class="btn btn-secondary">{{_('Edit')}}</a>
                    <a href="{{route('shop.show',[$shop])}}" class="btn btn-primary">{{_('Show')}}</a>
                    <form method="post" action="{{route('category.destroy', [$shop])}}">
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
