@extends('layouts.app')

@section('content')
<a href="{{route('company.create')}}"  >Create</a>
<table class="table table-stripped">
    <tr>
        <th>
            {!! _("ID") !!}
        </th>
        <th>
            {!! _("Name") !!}
        </th>
        <th>
            {!! _("Type") !!}
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
            <td>{{$company->name}}</td>
            <td>{{$company->type}}</td>
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
