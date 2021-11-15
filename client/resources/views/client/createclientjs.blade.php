@extends('layouts.app')

@section('content')

<div class="add-input">
    <button class="btn btn-primary" id="addInput">Add</button>
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
          <a href="{{route('client.index')}}" class="btn btn-secondary">{{ __('back') }}</a>
    </div>



{{-- </form> --}}
<script>
    $(document).ready(function() {

        console.log($('meta[name="csrf-token"]').attr('content'));

        $.ajaxSetup({
            headers:{
                "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
            }
        });
     $('.summernote').summernote();
     $("#addInput").click(function() {
            $(".clientsfields").append('<div class="clientfield"><div class="mb-3"><label for="client_name" class="form-label">{{_("Name")}}</label><input type="text" class="form-control " name="client_name[][name]" > </div> <div class="mb-3"> <label for="client_surname" class="form-label">{{_("Surname")}}</label> <input type="text" class="form-control "  name="client_surname[][surname]"> </div>  <div class="mb-3">  <label for="client_description" class="form-label">{{_("Description")}}</label>  <textarea type="text" class="form-control"  name="client_description[][description]" ></textarea> </div> <button type="button" class="btn btn-danger btn-remove">Remove</button> </div>');
        });
        $(document).on('click', '.btn-remove', function() {
            $(this).parents('.clientfield').remove();
        });
        $("#button").click(function(){
            console.log("veikia");
            var clientName=$("#clientName").val();
            var clientSurname=$("#clientSurname").val();
            var clientDescription=$("#clientDescription").val();
            console.log(clientName);
            $.ajax({
                type: 'POST',
                url: "{{route('client.store')}}",
                data: {clientName:clientName, clientSurname:clientSurname, clientDescription:clientDescription },
                success: function(data){
                    alert(data.success)
                }
            });
        });

    });
</script>
@endsection
