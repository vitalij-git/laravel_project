@extends('layouts.app')

@section('content')

    <form action="{{route('author.store', [$author])}}" method="POST">
        <div class="mb-3">
            <label for="author_name" class="form-label">{{_('Name')}}</label>
            <input type="text" class="form-control @error('author_name') is-invalid @enderror " value="{{$author->name}}"  name="author_name" >
        </div>
          <div class="mb-3">
            <label for="author_surname" class="form-label">{{_('Surname')}}</label>
            <input type="text" class="form-control @error('author_surname') is-invalid @enderror "  value="{{$author->surname}}"  name="author_surname" >


        @csrf
          <button type="submit" class="btn btn-primary">{{_('Create')}}</button>
          <a href="{{route('author.index')}}" class="btn btn-secondary">{{_('Back')}}</a>
    </form>
@endsection
