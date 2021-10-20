

@extends('layouts.app')

@section('content')
<a href="{{route('contact.create')}}" class="btn btn-primary create-btn" >Create</a>
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
            {!! _("Phone") !!}
        </th>
        <th>
            {!! _("Email") !!}
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
    @foreach ($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->title}}</td>
            <td>{{$contact->phone}}</td>
            <td>{{$contact->email}}</td>
            <td><a href="{{route('contact.edit',[$contact])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{route('contact.show',[$contact])}}" class="btn btn-primary">Show</a></td>
            <td><form action="{{route('contact.destroy', [$contact])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
    @endforeach
</table>

@endsection

