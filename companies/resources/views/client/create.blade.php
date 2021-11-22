
    <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="client_name" class="form-label">client name</label>
            <input type="text" class="form-control" name="client_name" placeholder="Enter a client name">
          </div>
          <div class="mb-3">
            <label for="client_surname" class="form-label">client surname</label>
            <input type="text" class="form-control" name="client_surname" placeholder="Enter a client surname">
          </div>
          <div class="mb-3">
            <label for="client_username" class="form-label">client username</label>
            <input type="text" class="form-control" name="client_userrname" placeholder="Enter a client username">
          </div>
          <div class="mb-3">
            <label for="client_company_id" class="form-label">Company</label>
            <input type="number" class="form-control" name="client_company_id" placeholder="Enter a client company id">
          </div>
          <div class="mb-3">
            <label for="client_image_url" class="form-label">Image url</label>
            <input type="number" class="form-control" name="client_image_url" >
          @csrf
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('client.index')}}" class="btn btn-primary">Back</a>
    </form>


