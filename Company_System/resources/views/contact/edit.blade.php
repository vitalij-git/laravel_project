@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
    <form action="{{route('city.create', [$contact])}}" method="post">
        <div class="mb-3">
            <label for="type_title" class="form-label">Contact title</label>
            <input type="text" class="form-control" name="contact_title" value="{{$contact->title}}">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Contact phone</label>
            <input type="number" class="form-control" name="contact_phone" value="{{$contact->phone}}">
        </div>
        <div class="mb-3">
            <label for="contact_address" class="form-label">Contact address</label>
            <input type="text" class="form-control" name="contact_address" value="{{$contact->address}}">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Contact email</label>
            <input type="text" class="form-control" name="contact_email" value="{{$contact->email}}">
        </div>
        <div class="mb-3">
            <label for="contact_country" class="form-label">Contact country</label>
            <input type="text" class="form-control" name="contact_country" value="{{$contact->country}}">
        </div>
        <div class="mb-3">
            <label for="contact_city" class="form-label">Contact city</label>
            <input type="text" class="form-control" name="contact_city" value="{{$contact->city}}">
        </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('contact.index')}}" class="btn btn-primary">Back</a>
    </form>

@endsection

@endsection
