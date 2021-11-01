@extends('layouts.app')

@section('content')
<a href="{{route('owner.create')}}" class="btn btn-primary create-btn" >{{_('Create')}}</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif
 <a class="btn btn-primary" href="{{route('owner.pdf')}}"> Export tasks table to PDF </a>
    <table class="table table-stripped">
            <tr>
                <th>
                    {{_('ID')}}
                </th>
                <th>
                    {{_('Name')}}
                </th>
                <th>
                    {{_('Surname')}}
                </th>
                <th>
                    {{_('Email')}}
                </th>
                <th>
                    {{_('Phone')}}
                </th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
                <th>
                    {{_('PDF')}}
                </th>
            </tr>
            @foreach ($owners as $owner)
                    <tr>
                        <td>
                            {{$owner->id}}
                        </td>
                        <td>
                            {{$owner->name}}
                        </td>
                        <td>
                            {{$owner->surname}}
                        </td>
                        <td>
                            {{$owner->email}}
                        </td>
                        <td>
                            {{$owner->phone}}
                        </td>
                        <td>
                            <a href="{{route('owner.edit',[$owner])}}" class="btn btn-primary">  {{_('Edit')}}</a>
                        </td>
                        <td>
                            <a href="{{route('owner.destroy',[$owner])}}" class="btn btn-danger">{{_('Delete')}}</a>
                        </td>
                        <td>
                        <a href="{{route('owner.pdfowner', [$owner])}}" class="btn btn-primary">Export owner PDF</a>
                    </td>
                    </tr>
            @endforeach
    </table>


@endsection
