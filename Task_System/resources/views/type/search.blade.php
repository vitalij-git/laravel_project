@extends('layouts.app')

@section('content')


    <form action="{{route('type.search')}}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Enter search key" />
        <button type="submit" class='btn btn-primary'>Search</button>
    </form>

    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title', 'Title')</th>
            <th>@sortablelink('description', 'Description')</th>
        </tr>
        @foreach ($types as $type)
            <tr>
                <td> {{$type->id }}</td>
                <td> {{$type->title }}</td>
                <td> {!!$type->description !!}</td>
            </tr>
        @endforeach
    </table>

    {!! $types->appends(Request::except('page'))->render() !!}
    <a href="{{route('type.index')}}" class="btn btn-secondary">Back</a>

@endsection
