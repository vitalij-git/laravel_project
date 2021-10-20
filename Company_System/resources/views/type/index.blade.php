

@extends('layouts.app')

@section('content')
<a href="{{route('type.create')}}" class="btn btn-primary create-btn" >Create</a>
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
            {!! _("Company") !!}
        </th>
        <th>
            {!! _("Edit") !!}
        </th>
        <th>
            {!! _("Delete") !!}
        </th>
    </tr>
    @foreach ($types as $type)
        <tr>
            <td>{{$type->id}}</td>
            <td>{{$type->title}}</td>
            <td><a href="{{route('company.show',[$type->typeCompany])}}">{{$type->typeCompany->title}}</a></td>
            <td><a href="{{route('type.edit',[$type])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{route('type.show',[$type])}}" class="btn btn-primary">Show</a></td>
            <td><form action="{{route('type.destroy', [$type])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
    @endforeach
</table>

@endsection
