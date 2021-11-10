@extends('layouts.app')

@section('content')

    <a href="{{route('client.createclient')}}" class="btn btn-primary">{{_('Create client')}}</a>
    <a href="{{route('client.createclients')}}" class="btn btn-primary">{{_('Create clients')}}</a>
    <a href="{{route('client.createclientjs')}}" class="btn btn-primary">{{_('Create client with javasricpt')}}</a>
    <table class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('name', 'Name') </td>
            <td> @sortablelink('surname', 'Surame') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($clients as $client)
            <tr>
                <td> {{$client->id}} </td>
                <td> {{$client->name}} </td>
                <td> {{$client->surname}} </td>
                <td> {{$client->description}} </td>

                <td>
                    {{-- <form method="post" action="{{route('client.destroy', [$client])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </table>



@endsection
