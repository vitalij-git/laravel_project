@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
    <form action="{{route('city.create')}}" method="post">
        <div class="mb-3">
            <label for="type_title" class="form-label">type title</label>
            <input type="text" class="form-control" name="contact_title" placeholder="Enter a contact title">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">type title</label>
            <input type="number" class="form-control" name="contact_phone" placeholder="Enter a contact phone">
        </div>
        <div class="mb-3">
            <label for="contact_address" class="form-label">type title</label>
            <input type="text" class="form-control" name="contact_address" placeholder="Enter a contact address">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">type title</label>
            <input type="text" class="form-control" name="contact_email" placeholder="Enter a contact email">
        </div>
        <div class="mb-3">
            <label for="contact_country" class="form-label">type title</label>
            <input type="text" class="form-control" name="contact_country" placeholder="Enter a contact country">
        </div>
        <div class="mb-3">
            <label for="contact_city" class="form-label">type title</label>
            <input type="text" class="form-control" name="contact_city" placeholder="Enter a contact city">
        </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('contact.store')}}" class="btn btn-primary">Back</a>
    </form>

@endsection

@endsection
