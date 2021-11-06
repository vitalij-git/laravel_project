@extends('layouts.app')

@section('content')
<a href="{{route('book.create')}}" class="btn btn-primary create-btn" >Create</a>
<div class="top-action">


    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select class="form-control-sm" name="bookTitleFilter">
               @foreach ($filterBooks as $book)
               <option value="{{$book->title}}" >{{$book->title}}</option>
               @endforeach
           </select>
           <button type="submit" class="btn btn-primary" >Book filter</button>
    </form>
    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select class="form-control-sm" name="bookAuthorFilter">
               @foreach ($authors as $author)
               <option value="{{$author->id}}" >{{$author->name}}</option>
               @endforeach
           </select>
           <button type="submit" class="btn btn-primary" >Author filter</button>
    </form>
</div>
<form action="{{route('book.statistics')}}" method="GET">
    <button type="submit" class="btn btn-secondary">Export statistics to PDF</button>
</form>
<table class="table table-stripped">
            <tr>
                <td>
                    @sortablelink('id','ID')
                </td>
                <td>
                    @sortablelink('title','title')
                </td>
                <td>
                    @sortablelink('isbn','ISBN')
                </td>
                <td>
                    @sortablelink('pages','Pages')
                </td>
                <td>
                    @sortablelink('author_id', 'Author')
                </td>
                <td>
                    {{_('Edit')}}
                </td>
                <td>
                    {{_('Show')}}
                </td>
                <td>
                    {{_('Delete')}}
                </td>
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
                            {{$book->authorBook->surname}}
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
