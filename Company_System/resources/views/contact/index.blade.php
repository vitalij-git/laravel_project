@extends('layouts.app')

@section('content')

@extends('layouts.app')

@section('content')
<a href="{{route('contact.create')}}" class="btn btn-primary create-btn" >Create</a>
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
            {!! _("Delete") !!}
        </th>
    </tr>
    @foreach ($types as $type)
        <tr>
            <td>{{$type->id}}</td>
            <td>{{$type->title}}</td>
            <td>{{$type->phone}}</td>
            <td>{{$type->email}}</td>
            <td><a href="{{route('contact.edit',[$company])}}" class="btn btn-primary">Edit</a></td>
            <td><form action="{{route('contact.destroy', [$company])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
    @endforeach
</table>

@endsection

@endsection
