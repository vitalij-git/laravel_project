@extends('layouts.app')

@section('content')

    <a href="{{route('client.createclient')}}" class="btn btn-primary">{{_('Create client')}}</a>
    <a href="{{route('client.createclients')}}" class="btn btn-primary">{{_('Create clients')}}</a>
    <a href="{{route('client.createclientjs')}}" class="btn btn-primary">{{_('Create client with javasricpt')}}</a>
    <div class="add-input">
        <button class="btn btn-primary" id="addInput">Add input</button>
    </div>
    {{-- <form action="{{route('client.store')}}" method="Post">
        @csrf --}}
        <div class="clientsfields">

            <div class="clientfield">
                <div class="mb-3">
                    <label for="client_name" class="form-label">{{_('Name')}}</label>
                    <input type="text" class="form-control " name="clientName[][name]" id="clientName" >
                </div>
                  <div class="mb-3">
                    <label for="client_surname" class="form-label">{{_('Surname')}}</label>
                    <input type="text" class="form-control "  name="clientSurname[][surname]" id="clientSurname">
                  </div>
                  <div class="mb-3">
                    <label for="client_description" class="form-label">{{_('Description')}}</label>
                    <textarea type="text" class="form-control"  name="clientDescription[][description]" id="clientDescription"></textarea>
                  </div>
                  <button type="button" class="btn btn-danger btn-remove">Remove</button>
            </div>

        </div>
        <div>
              <button type="submit" name="AddClientsJS" class="btn btn-primary button" id="button" >Add</button>
            <button class="btn btn-danger" id="dummyAdd">Dummy Add</button>
            </div>


    <table id="clients" class="table table-striped">

        <tr>
            <td> @sortablelink('id', 'ID') </td>
            <td> @sortablelink('name', 'Name') </td>
            <td> @sortablelink('surname', 'Surame') </td>
            <td> @sortablelink('description', 'Description') </td>
            <td>{{_('Actions')}} </td>
        </tr>

        @foreach ($clients as $client)
            <tr class="client">
                <td> {{$client->id}} </td>
                <td> {{$client->name}} </td>
                <td> {{$client->surname}} </td>
                <td> {!!$client->description!!} </td>

                <td>
                    <form method="post" action="{{route('client.destroy', [$client])}}">
                        @csrf
                        <button class="btn btn-danger" type="submit">{{_('Delete')}}</button>
                    </form>
                    <button class="btn btn-danger delete" data-logger="{{$client->id}}">{{_('Delete with AJAX')}}</button>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                    headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                 });
             $('.summernote').summernote();
             $("#addInput").click(function() {
            $(".clientsfields").append('<div class="clientfield"><div class="mb-3"><label for="client_name" class="form-label">{{_("Name")}}</label><input type="text" class="form-control " name="client_name[][name]" > </div> <div class="mb-3"> <label for="client_surname" class="form-label">{{_("Surname")}}</label> <input type="text" class="form-control "  name="client_surname[][surname]"> </div>  <div class="mb-3">  <label for="client_description" class="form-label">{{_("Description")}}</label>  <textarea type="text" class="form-control"  name="client_description[][description]" ></textarea> </div> <button type="button" class="btn btn-danger btn-remove">Remove</button> </div>');
             });
             $("delete").click(){
                // $(this).attr("data-logger");
                $.ajax({
                    type: 'POST',
                    url: "clients/destroy" + "/" + $(this).attr("data-logger"),
                    data: {clientName:clientName, clientSurname:clientSurname, clientDescription:clientDescription },
                    success: function(data){
                        alert("Deleted");
                    }
                });
             }

            $(document).on('click', '.btn-remove', function() {
                $(this).parents('.clientfield').remove();
            });
            $("#button").click(function(){
                var clientName=$("#clientName").val();
                var clientSurname=$("#clientSurname").val();
                var clientDescription=$("#clientDescription").val();
                console.log(clientName);
                $.ajax({
                    type: 'POST',
                    url: "{{route('client.store')}}",
                    data: {clientName:clientName, clientSurname:clientSurname, clientDescription:clientDescription },
                    success: function(data){
                        $("#clients").append("<tr><td>"+ data.clientID + "</td><td>" + data.clientName + "</td><td>" + data.clientSurname +"</td><td>" + data.clientDescription + "</td> </tr>")
                        alert(data.message)
                    }
                });
            });

            // $('#dummyAdd').click(){

            // }
        });
    </script>


@endsection
