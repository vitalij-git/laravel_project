@extends('layouts.app')

@section('content')
<a href="{{route('paginationsetting.create')}}" class="btn btn-primary create-btn" >Create</a>
@if(session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get("error_message")}}
        </div>
 @endif

</form>
    <table class="table table-stripped">
            <tr>
                <th>
                    {{_('ID')}}
                </th>
                <th>
                    {{_('title')}}
                </th>
                <th>
                    {{_('Value')}}
                </th>
                <th>
                    {{_('Visible')}}
                </th>
                <th>
                    {{_('Edit')}}
                </th>
                <th>
                    {{_('Delete')}}
                </th>
            </tr>
            @foreach ($paginations as $pagination)
                    <tr>
                        <td>
                            {{$pagination->id}}
                        </td>
                        <td>
                            {{$pagination->title}}
                        </td>
                        <td>
                            {{$pagination->value}}
                        </td>
                        <td>
                            {{$pagination->visible}}
                        </td>
                        <td>
                            <a href="{{route('paginationsetting.edit',[$pagination])}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="{{route('paginationsetting.destroy',[$pagination])}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            @endforeach
    </table>
@endsection
