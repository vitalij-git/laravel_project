@extends('layouts.app')

@section('content')
<h1>Information about client</h1>
<p>{{$client->name}}</p>
<p>{{$client->surname}}</p>
<p>{{$client->username}}</p>

<a href="{{route('client.index')}}" class="btn btn-primary">Back</a>


@endsection
