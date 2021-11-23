@extends('layouts.app')

@section('content')
<h1>Information about {{$category->title}} category</h1>
<p>{{$category->description}}</p>

    @if($postCount > 0)
    <h2 class="post-list">Clients</h2>
    <table class="table table-striped ">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('title', 'Title') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td>{{_('Actions')}} </td>
        </tr>
        <a href="{{route('category.index')}}" class="btn btn-secondary">Back</a>
    @foreach ($posts as $post)
        <tr class="post-block">
            <td> {{$post->id}} </td>
            <td> {{$post->title}} </td>
            <td> {{$post->description}} </td>
            <td><button class="btn btn-danger postDelete" data-post="{{$post->id}}">{{_('Delete')}}</button></td>
        </tr>
     @endforeach
     @else
        <div class="aler alert-danger">
            <p>The company has no one client</p>
        </div>

     @endif
</table>

<script>
   $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".postDelete").click(function() {
            var postID = $(this).attr("data-post");
            $(this).parents(".post-block").remove();
            $.ajax({
                type: 'POST',
                url: '/posts/delete/' + postID ,
                success: function(data) {
                    alert(data.success);
                    if(data.postCount == 0) {
                        $(".table").remove();
                        $(".post-list").remove();
                        $(".container-show").append(" <div class='aler alert-danger'><p>The company has no one client</p></div> ")

                    }
                }
            });
        });
   });
</script>
@endsection
