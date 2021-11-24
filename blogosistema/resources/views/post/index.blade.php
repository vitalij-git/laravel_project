@extends('layouts.app')

@section('content')

    <a href="{{route('post.create')}}" class="btn btn-primary">{{_('Create post')}}</a>

    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td> @sortablelink('category_id', 'Category') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td> {{$post->id}} </td>
                <td> {{$post->title}} </td>
                <td> {{$post->description}} </td>
                <td> {{$post->category_id}} </td>
                <td>
                    <a href="{{route('post.edit',[$post])}}" class="btn btn-secondary">{{_('Edit')}}</a>
                    <form method="post" action="{{route('post.destroy', [$post])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->appends(Request::except('page'))->render() !!}</div>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $("#show-button").on('click', function(){
                $('.category-fields').toggleClass('d-none');
            });
            $.ajaxSetup({
                    headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                 });
            $("#add-button").on('click', function(){
                var category_title = $('#category_title').val();
                var category_shop_id = $('#category_shop_id').val();
                var category_description = $('#category_description').val();
                //var product_image = $('#product_image').val();
                console.log(category_description);
                $.ajax({
                    type: 'POST',
                    url: "{{route('category.store')}}",
                    data: {category_title:category_title, category_shop_id:category_shop_id, category_description:category_description  },
                    success: function(data){
                        alert(data.error)
                        $('.category-fields').toggleClass('d-none');
                    }
                });
            });
        });

    </script>
@endsection
