@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create client') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('client.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" required  autofocus>

                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="client_surname" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_surname" value="{{ old('client_surname') }}" required  autofocus>

                                @error('client_surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="client_description" type="text" class="form-control summernote @error('client_description') is-invalid @enderror" name="client_description"  required  autofocus>
                                    {{ old('client_description') }}
                                </textarea>
                                @error('client_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="AddClient" value="1">
                                    {{ __('Create') }}
                                </button>
                                <a href="{{route('client.index')}}" class="btn btn-secondary">{{ __('back') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
     $('.summernote').summernote();
    });
</script>
@endsection
