
        @extends('layouts.app')

        @section('content')
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="student_name" class="form-label">Name</label>
                            <input type="text" name="student_name" class="form-control" placeholder="Enter student name"  />
                        </div>
                        <div class="mb-3">
                            <label  for="student_surname " class="form-label">Surname</label>
                            <input type="text" name="student_surname" class="form-control" placeholder="Enter student surname"  />
                        </div>
                        <div class="mb-3">
                            <label for="student_group_id" class="form-label">Group</label>
                            <select type="number"  class="form-control" name="student_group_id" >
                            @foreach ($attendance_groups as $attendance_group )
                            <option value="{{$attendance_group->id}}"> {{$attendance_group->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Link</label>
                            <input type="file" class="form-control" name="student_image_url" placeholder="Enter student image " />
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Create new </button>
                        <a href="{{route('student.index')}}" class="btn btn-primary">Back</a>
                    </form>
                </div>
                @endsection

