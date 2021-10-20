@extends('layouts.app')

@section('content')
<a href="{{route('company.create')}}" class="btn btn-primary create-btn" >Create</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif

    @if(session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get("success_message")}}
        </div>
    @endif
<table class="table table-stripped">
    <tr>
        <th>
            {!! _("ID") !!}
        </th>
        <th>
            {!! _("Title") !!}
        </th>
        <th>
            {!! _("Contact") !!}
        </th>
        <th>
            {!! _("Logo") !!}
        </th>
        <th>
            {!! _("Edit") !!}
        </th>
        <th>
            {!! _("Show") !!}
        </th>
        <th>
            {!! _("Delete") !!}
        </th>
    </tr>
    @foreach ($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->title}}</td>
            <td><a href="{{route('contact.show',[$company->contact])}}">{{$company->contact->title}}</a></td>
            <td><img src="{{$company->logo}}" width="150" alt="{{$company->title}}"/></td>
            <td><a href="{{route('company.edit',[$company])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{route('company.show',[$company])}}" class="btn btn-primary">Show</a></td>
            <td><form action="{{route('company.destroy', [$company])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
    @endforeach
</table>

@endsection
