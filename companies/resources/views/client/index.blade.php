@extends('layouts.app')

@section('content')
<a href="{{route('client.create')}}"  >Create</a>
<table class="table table-stripped">
    <tr>
        <th>
            {!! _("ID") !!}
        </th>
        <th>
            {!! _("Name") !!}
        </th>
        <th>
            {!! _("Surname") !!}
        </th>
        <th>
            {!! _("Username") !!}
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
    @foreach ($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->surname}}</td>
            <td>{{$client->username}}</td>
            <td><a href="{{route('client.edit',[$client])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{route('client.show',[$client])}}" class="btn btn-primary">Show</a></td>
            <td><form action="{{route('client.destroy', [$client])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
    @endforeach
</table>

@endsection
