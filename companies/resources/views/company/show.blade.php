@extends('layouts.app')

@section('content')
<h1>Information about company</h1>
<p>{{$company->name}}</p>
<p>{{$company->type}}</p>
<p>{{$company->description}}</p>

<a href="{{route('company.index')}}" class="btn btn-primary">Back</a>


@endsection
