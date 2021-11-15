@extends('layouts.app')

@section('content')

    <a href="{{route('shop.create')}}" class="btn btn-primary">{{_('Create shop')}}</a>
   <button id="show-button" class="btn btn-primary">Add shop</button>
    <div class="shop-fields d-none">
        <div class="form-group row">
            <label for="shop_title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="shop_title" type="text" class="form-control @error('shop_title') is-invalid @enderror" name="shop_title" value="{{ old('shop_title') }}" required  autofocus>

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
                <textarea id="shop_description" type="text" class="form-control summernote @error('shop_description') is-invalid @enderror" name="shop_description"  required  autofocus>
                    {{ old('shop_description') }}
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
                <input id="shop_email" type="email" class="form-control @error('email') is-invalid @enderror" name="shop_email" value="{{ old('shop_email') }}" required autocomplete="email" autofocus>
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
                <input id="shop_phone" type="text" class="form-control @error('shop_phone') is-invalid @enderror" name="shop_phone" value="{{ old('shop_phone') }}" required  autofocus>

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
                <input id="shop_country" type="text" class="form-control @error('shop_country') is-invalid @enderror" name="shop_country" value="{{ old('shop_country') }}" required  autofocus>

                @error('shop_country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    <button class="btn btn-primary" id="add-button">Add</button>
    </div>

    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td> @sortablelink('email', 'Email') </td>
            <td> @sortablelink('phone', 'Phone') </td>
            <td> @sortablelink('country', 'Country') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($shops as $shop)
            <tr>
                <td> {{$shop->id}} </td>
                <td> {{$shop->title}} </td>
                <td> {{$shop->description}} </td>
                <td> {{$shop->email}} </td>
                <td> {{$shop->phone}} </td>
                <td> {{$shop->country}} </td>
                <td>
                    <a href="{{route('shop.edit',[$shop])}}" class="btn btn-secondary">{{_('Edit')}}</a>
                    <form method="post" action="{{route('category.destroy', [$shop])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $shops->appends(Request::except('page'))->render() !!}</div>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $("#show-button").on('click', function(){
                $('.shop-fields').toggleClass('d-none');
            });
            $.ajaxSetup({
                    headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                 });
            $("#add-button").on('click', function(){
                var shop_title = $('#shop_title').val();
                var shop_description = $('#shop_description').val();
                var shop_email = $('#shop_email').val();
                var shop_phone = $('#shop_phone').val();
                var shop_country = $('#shop_country').val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('shop.store')}}",
                    data: {shop_title:shop_title, shop_country:shop_country, shop_description:shop_description, shop_phone:shop_phone, shop_email:shop_email  },
                    success: function(data){
                        alert(data.success)
                        $('.category-fields').toggleClass('d-none');
                    }
                });
            });
        });

    </script>



@endsection
