@extends('layouts.app')

@section('content')
{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        <ul>
            <li>{{$error}}</li>
        </ul>
    </div>
    @endforeach
@endif --}}

    <form action="{{route('task.store')}}" method="POST">
        <div class="mb-3">
            <label for="task_title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control @error('task_title') is-invalid @enderror " value="{{ old('task_title') }}" name="task_title" placeholder="">
            @error('task_title')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
        </div>
          <div class="mb-3">
            <label for="task_description" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control summernote @error('task_description') is-invalid @enderror " value="{{ old('task_description') }}" name="task_description" ></textarea>
            @error('task_description')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <div class="form-group row">
            <label for="task_type_id" class="form-label">{{ __('Type') }}</label>
            <div class="col-md-6">
                 <select class="form-control @error('task_type_id') is-invalid @enderror " value="{{ old('task_type_id') }}" name="task_type_id">
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
            @error('task_type_id')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group row">
            <label for="task_owner_id" class="form-label">{{ __('Owner') }}</label>
            <div class="col-md-6">
                 <select class="form-control @error('task_owner_id') is-invalid @enderror " value="{{ old('task_owner_id') }}" name="task_owner_id">
                    @foreach ($owners as $owner)
                    <option value="{{$owner->id}}">{{$owner->name}}{{$owner->surname}}</option>
                    @endforeach
                </select>
            </div>
            @error('task_owner_id')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
        </div>
        <div class="mb-3">
            <label for="task_start_date" class="form-label">{{ __('Start date') }}</label>
            <input type="date" class="form-control @error('task_start_date') is-invalid @enderror " value="{{ old('task_start_date') }}" name="task_start_date" >
            @error('task_start_date')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
          <div class="mb-3">
            <label for="task_end_date" class="form-label">{{ __('End date') }}</label>
            <input type="date" class="form-control @error('task_end_date') is-invalid @enderror " value="{{ old('task_end_date') }}" name="task_end_date" >
            @error('task_end_date')
            <span role="alert" class="invalid-feedback">
                <strong>*{{$message}}</strong>
            </span>
        @enderror
          </div>
        @csrf
          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
          <a href="{{route('task.index')}}" class="btn btn-secondary">{{ __('Back') }}</a>
    </form>

    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
