
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
                    <form action="{{route('student.store')}}" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="student_name" class="form-control" placeholder="Enter student name"  />
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Surname</label>
                            <input type="text" name="school_description" class="student_surname" placeholder="Enter student surname"  />
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Group</label>
                            <input type="number"  class="form-control" name="student_group_id" placeholder="Enter student group id" />
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Link</label>
                            <input type="text" class="form-control" name="student_image_url" placeholder="Enter student image link" />
                        </div>
                        @csrf
                        <button type="submit" class="btn btn_primary">Create new </button>
                        <a href="{{route('student.index')}}" class="btn btn-primary">Back</a>
                    </form>
                </div>
                @endsection

