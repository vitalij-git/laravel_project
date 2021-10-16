@extends('layouts.app')

@section('content')
<h1>Information Company contact</h1>
<p>{{$contact->title}}</p>
<p>{{$contact->phone}}</p>
<p>{{$contact->address}}</p>
<p>{{$contact->email}}</p>
<p>{{$contact->country}}</p>
<p>{{$contact->city}}</p>
<a href="{{route('contact.index')}}" class="btn btn-primary">Back</a>

@endsection
