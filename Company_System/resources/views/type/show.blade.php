@extends('layouts.app')

@section('content')
<h1>Information about type</h1>
<p>{{$type->title}}</p>
<p>{{$type->description}}</p>
<p>{{$type->typeCompany->title}}</p>
<a href="{{route('type.index')}}" class="btn btn-primary">Back</a>

@endsection
