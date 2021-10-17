
@extends('layouts.app')

@section('content')
    <form action="{{route('type.update', [$type])}}" method="POST">
            <div class="mb-3">
                <label for="type_title" class="form-label">type title</label>
                <input type="text" class="form-control" name="type_title" value="{{$type->title}}">
            </div>
            <div class="mb-3">
                <label for="type_description" class="form-label">Enter a type description</label>
                <textarea class="form-control summernote" name="type_description" rows="5">{{$type->description}}</textarea>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                     <select class="form-control" name="type_company_id">
                        @foreach ($companies as $company)
                        <option value="{{$company->id}}" @if($company->id == $type->company_id) selected @endif >{{$company->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @csrf
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('type.index')}}" class="btn btn-primary">Back</a>
        </form>
    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection

