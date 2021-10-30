@extends('layouts.app')

@section('content')

    <form action="{{route('owner.store', [$owner])}}" method="POST">
        <div class="mb-3">

            <label for="owner_name" class="form-label">{{_('Name')}}</label>
            <input type="text" class="form-control @error('owner_name') is-invalid @enderror "  name="owner_name" value="{{$owner->name}}">
            @error('owner_name')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
        </div>
          <div class="mb-3">
            <label for="owner_surname" class="form-label">{{_('Surname')}}</label>
            <input type="text" class="form-control @error('owner_surname') is-invalid @enderror "  name="owner_surname" value="{{$owner->surname}}">
            @error('owner_surname')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <div class="mb-3">
            <label for="owner_email" class="form-label">{{_('Email')}}</label>
            <input type="text" class="form-control @error('owner_email') is-invalid @enderror "  name="owner_email" value="{{$owner->email}}">
            @error('owner_email')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <div class="mb-3">
            <label for="owner_phone" class="form-label">{{_('Phone')}}</label>
            <input type="text" class="form-control @error('owner_phone') is-invalid @enderror "  name="owner_phone" value="{{$owner->phone}}">
            @error('owner_phone')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>


        @csrf
          <button type="submit" class="btn btn-primary">{{_('Edit')}}</button>
          <a href="{{route('owner.index')}}" class="btn btn-secondary">{{_('Back')}}</a>
    </form>
@endsection

