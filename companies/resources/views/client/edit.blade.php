
    <form action="{{route('client.update')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="client_name" class="form-label">client name</label>
            <input type="text" class="form-control" name="client_name" value="{{$client->name}}">
          </div>
          <div class="mb-3">
            <label for="client_surname" class="form-label">client surname</label>
            <input type="text" class="form-control" name="client_surname" value="{{$client->surname}}">
          </div>
          <div class="mb-3">
            <label for="client_username" class="form-label">client username</label>
            <input type="text" class="form-control" name="client_userrname" value="{{$client->username}}">
          </div>
          <div class="mb-3">
            <label for="client_company_id" class="form-label">Company</label>
            <input type="number" class="form-control" name="client_company_id" value="{{$client->company_id}}">
          </div>
          <div class="mb-3">
            <label for="client_image_url" class="form-label">Image url</label>
            <input type="number" class="form-control" name="client_image_url" value="{{$client->image_url}}" >
          @csrf
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('client.index')}}" class="btn btn-primary">Back</a>
    </form>



