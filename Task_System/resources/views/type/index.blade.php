@extends('layouts.app')

@section('content')

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
