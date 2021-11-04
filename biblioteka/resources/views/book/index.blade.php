@extends('layouts.app')

@section('content')
<a href="{{route('book.create')}}" class="btn btn-primary create-btn" >Create</a>
<div class="top-action">


    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select name="collumnname" class="form-control-sm" aria-label=".form-select-lg example">

            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
            @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'isbn')
                <option value="isbn" selected>Isbn</option>
            @else
                <option value="isbn">Isbn</option>
            @endif

            @if ($collumnName == 'pages')
            <option value="pages" selected>Pages</option>
        @else
            <option value="pages">Pages</option>
        @endif

        </select>

        <select name="sortby" class="form-control-sm">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button type="submit" class="btn btn-primary">SORT</button>

    </form>
    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select class="form-control-sm" name="author_filter">
               @foreach ($authors as $author)
               <option value="{{$author->id}}" >{{$author->name}}</option>
               @endforeach
           </select>
           <button type="submit" class="btn btn-primary" >Author filter</button>
    </form>
</div>
<table class="table table-stripped">
            <tr>
                <th>
                    {{_('ID')}}
                </th>
                <th>
                    {{_('title')}}
                </th>
                <th>
                    {{_('ISBN')}}
                </th>
                <th>
                    {{_('Pages')}}
                </th>
                <th>
                    {{_('Author')}}
                </th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Show')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
            </tr>
            @foreach ($books as $book)
                    <tr>
                        <td>
                            {{$book->id}}
                        </td>
                        <td>
                            {{$book->title}}
                        </td>
                        <td>
                            {{$book->isbn}}
                        </td>
                        <td>
                            {{$book->pages}}
                        </td>
                        <td>
                            {{$book->authorBook->name}}
                            {{-- {{$book->authorBook->surname}} --}}
                        </td>
                        <td>
                            <a href="{{route('book.edit',[$book])}}" class="btn btn-primary">{{_('Edit')}}</a>
                        </td>
                        <td>
                            <a href="{{route('book.show',[$book])}}" class="btn btn-primary"> {{_('Show')}}</a>
                        </td>
                        <td>
                            <a href="{{route('book.destroy',[$book])}}" class="btn btn-danger">{{_('Delete')}}</a>
                        </td>
                    </tr>
            @endforeach
    </table>

        {!! $books->appends(Request::except('page'))->render() !!}

@endsection
