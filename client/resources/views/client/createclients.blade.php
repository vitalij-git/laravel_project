@extends('layouts.app')

@section('content')
<form action="{{route('client.createclients')}}" method="GET">
@csrf
<input type="text" class="form-control" name="inputs_numbers" value={{$clientsCount}}>
<button type="submit" class="btn btn-primary">Create inputs</button>
</form>
<form method="get" action="{{route('client.createclients')}}">
    @csrf
    <input type="text" name="inputs_numbers" value="{{$clientsCount}}" hidden>
    <button type="submit" name="clientInput" class="btn btn-secondary" value="1">add</button>
    <button type="submit" name="clientInput" class="btn btn-secondary" value="0">remove</button>
</form>
<form action="{{route('client.store')}}" method="Post">
    @csrf
    @for ($i=0;$i<$clientsCount;$i++)
        <div class="client">
            <label for="client_name" class="form-label">{{_('Name')}}</label>
            <input type="text" class="form-control " name="client_name[][name]" >
            <label for="client_surname" class="form-label">{{_('Surname')}}</label>
            <input type="text" class="form-control "  name="client_surname[][surname]">
            <label for="client_description" class="form-label">{{_('Description')}}</label>
            <textarea type="text" class="form-control summernote"  name="client_description[][description]" ></textarea>
        </div>
      @endfor

      <button type="submit" name="AddClients" class="btn btn-primary">Add</button>


</form>
<script>
    $(document).ready(function() {
     $('.summernote').summernote();
    });
</script>
@endsection
