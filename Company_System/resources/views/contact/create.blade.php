
@extends('layouts.app')

@section('content')
    <form action="{{route('contact.store')}}" method="post">
        <div class="mb-3">
            <label for="contact_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="contact_title" placeholder="Enter a contact title">
        </div>
        <div class="mb-3">
            <label for="contact_phone" class="form-label">Phone</label>
            <input type="number" class="form-control" name="contact_phone" placeholder="Enter a contact phone">
        </div>
        <div class="mb-3">
            <label for="contact_address" class="form-label">Address</label>
            <input type="text" class="form-control" name="contact_address" placeholder="Enter a contact address">
        </div>
        <div class="mb-3">
            <label for="contact_email" class="form-label">Email</label>
            <input type="text" class="form-control" name="contact_email" placeholder="Enter a contact email">
        </div>
        <div class="mb-3">
            <label for="contact_country" class="form-label">Country</label>
            <input type="text" class="form-control" name="contact_country" placeholder="Enter a contact country">
        </div>
        <div class="mb-3">
            <label for="contact_city" class="form-label">City</label>
            <input type="text" class="form-control" name="contact_city" placeholder="Enter a contact city">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('contact.index')}}" class="btn btn-primary">Back</a>
    </form>

@endsection


