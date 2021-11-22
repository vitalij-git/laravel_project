
    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="company_name" class="form-label">Company name</label>
            <input type="text" class="form-control" name="company_name" placeholder="Enter a company name">
          </div>
          <div class="mb-3">
            <label for="company_type" class="form-label">Company type</label>
            <input type="text" class="form-control" name="company_type" placeholder="Enter a company type">
          </div>
          <div class="mb-3">
            <label for="company_description" class="form-label">Enter a company description</label>
            <textarea class="form-control"  name="company_description"></textarea>
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('company.index')}}" class="btn btn-primary">Back</a>
    </form>


