@extends('layouts.app')

@section('content')
<a href="{{route('author.create')}}" class="btn btn-primary create-btn" >{{_('Create')}}</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif
    <table class="table table-stripped">
            <tr>
                <th>
                    @sortablelink('id','ID')
                    {{-- {{_('ID')}} --}}
                </th>
                <th>
                    @sortablelink('name','Name')
                    {{-- {{_('Name')}} --}}
                </th>
                <th>
                    @sortablelink('surname','Surname')
                    {{-- {{_('Surname')}} --}}
                </th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
            </tr>
            @foreach ($authors as $author)
                    <tr>
                        <td>
                            {{$author->id}}
                        </td>
                        <td>
                            {{$author->name}}
                        </td>
                        <td>
                            {{$author->surname}}
                        </td>
                        <td>
                            <a href="{{route('author.edit',[$author])}}" class="btn btn-primary">  {{_('Edit')}}</a>
                        </td>
                        <td>
                            <a href="{{route('author.destroy',[$author])}}" class="btn btn-danger">{{_('Delete')}}</a>
                        </td>
                    </tr>
            @endforeach
    </table>


@endsection
