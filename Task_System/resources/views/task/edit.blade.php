@extends('layouts.app')

@section('content')

    <form action="{{route('task.update', [$task])}}" method="POST">
        <div class="mb-3">
            <label for="task_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="task_title" value="{{$task->title}}">
          </div>
          <div class="mb-3">
            <label for="task_description" class="form-label">Description</label>
            <textarea class="form-control summernote" name="task_description" >{{$task->description}}</textarea>
          </div>
          <div class="form-group row">
            <label for="task_type_id" class="form-label">Type</label>
            <div class="col-md-6">
                 <select class="form-control" name="task_type_id">
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" @if($type->id == $task->type_id) selected @endif  >{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="task_start_date" class="form-label">Start date</label>
            <input type="text" class="form-control" name="task_start_date" value="{{$task->start_date}}" >
          </div>
          <div class="mb-3">
            <label for="task_end_date" class="form-label">End date</label>
            <input type="text" class="form-control" name="task_end_date" value="{{$task->end_date}}" >
          </div>
          @csrf
          <button type="submit" class="btn btn-primary">Edit</button>
          <a href="{{route('task.index')}}" class="btn btn-secondary">Back</a>
    </form>

    <script>
        $(document).ready(function() {
         $('.summernote').summernote();
        });
    </script>
@endsection
