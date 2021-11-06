@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create shop') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('shop.update', [$shop]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="shop_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="shop_title" type="text" class="form-control @error('shop_title') is-invalid @enderror" name="shop_title" value="{{ $shop->title }}" required  autofocus>

                                @error('shop_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="shop_description" type="text" class="form-control summernote @error('shop_description') is-invalid @enderror" name="shop_descripton"  required  autofocus>
                                    {{  $shop->description }}
                                </textarea>
                                @error('shop_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="shop_email" type="email" class="form-control @error('email') is-invalid @enderror" name="shop_email" value="{{  $shop->email }}" required autocomplete="email" autofocus>
                                @error('shop_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="shop_phone" type="text" class="form-control @error('shop_phone') is-invalid @enderror" name="shop_phone" value="{{  $shop->phone }}" required  autofocus>

                                @error('shop_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="shop_country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="shop_country" type="text" class="form-control @error('shop_country') is-invalid @enderror" name="shop_country" value="{{  $shop->country}}" required  autofocus>

                                @error('shop_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                                <a href="{{route('shop.index')}}" class="btn btn-secondary">{{ __('back') }}</a>
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
