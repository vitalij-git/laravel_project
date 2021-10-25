@extends('layouts.app')

@section('content')
<h1>Information about pagination setting</h1>
<p>{{$pagination->id}}</p>
<p>{{$pagination->value }}</p>
<p>{{$pagination->visible}}</p>

<a href="{{route('paginationsetting.index')}}" class="btn btn-primary">Back</a>

@endsection
