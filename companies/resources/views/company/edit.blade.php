
    <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="company_name" class="form-label">Company name</label>
            <input type="text" class="form-control" name="company_name" value="{{$company->name}}">
          </div>
          <div class="mb-3">
            <label for="company_type" class="form-label">Company type</label>
            <input type="text" class="form-control" name="company_type" value="{{$company->type}}">
          </div>
          <div class="mb-3">
            <label for="company_description" class="form-label">Enter a company description</label>
            <textarea class="form-control"  name="company_description">value="{{$company->description}}"</textarea>
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href="{{route('company.index')}}" class="btn btn-primary">Back</a>
    </form>



