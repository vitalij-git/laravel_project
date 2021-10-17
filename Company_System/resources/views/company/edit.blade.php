@extends('layouts.app')

@section('content')
    <form action="{{route('company.update', [$company])}}" method="POST">
        <div class="mb-3">
            <label for="company_title" class="form-label">Company title</label>
            <input type="text" class="form-control" name="company_title" value="{{$company->title}}">
          </div>
          <div class="mb-3">
            <label for="company_description" class="form-label">description</label>
            <textarea class="form-control summernote" name="company_description" rows="5">{{$company->description}}</textarea>
          </div>
          <div class="mb-3">
            <label for="company_logo" class="form-label">Company logo</label>
            <input class="form-control " type="file" id="formFile" name="company_logo">
          </div>
          <div class="form-group row">
            <label for="company_contact_id" class="form-label">Contact</label>
            <div class="col-md-6">
                 <select class="form-control" name="company_contact_id">
                    @foreach ($contacts as $contact)
                    <option value="{{$contact->id}}" @if($contact->id == $company->contact_id) selected @endif >{{$contact->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
          @csrf
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href="{{route('company.index')}}" class="btn btn-primary">Back</a>

    </form>
    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
