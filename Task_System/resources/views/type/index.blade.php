@extends('layouts.app')

@section('content')

<a href="{{route('type.create')}}" class="btn btn-primary create-btn" >Create</a>

@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif

<form action="{{route('type.search')}}" method="GET">
    @csrf
    <input type="text" name="search" placeholder="Enter search key" />
    <button type="submit" class="btn btn-primary">Search</button>
</form>
    <table class="table table-stripped">
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title')</th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Show')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
            </tr>
            @foreach ($types as $type)
                    <tr>
                        <td>
                            {{$type->id}}
                        </td>
                        <td>
                            {{$type->title}}
                        </td>
                        <td>
                            <a href="{{route('type.edit',[$type])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{route('type.show',[$type])}}" class="btn btn-primary">Show</a>
                        </td>
                        <td>
                            <a href="{{route('type.destroy',[$type])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            @endforeach

    </table>
    {!! $types->appends(Request::except('page'))->render() !!}
@endsection
