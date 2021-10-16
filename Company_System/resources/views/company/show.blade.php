@extends('layouts.app')

@section('content')
<h1>Information about company</h1>
<p>{{$company->title}}</p>
<p>{{$company->description}}</p>
<p><img src="{{ asset($company->logo) }}"/></p>
<a href="{{route('company.index')}}" class="btn btn-primary">Back</a>


@endsection
