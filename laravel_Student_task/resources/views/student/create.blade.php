
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
                    Name: <input type="text" name="student_name" placeholder="Enter student name" />
                    Surname: <input type="text" name="student_surname" placeholder="Enter student surname" />
                    Group: <input type="number" name="student_group_id" placeholder="Enter student group id"  />
                    Url: <input type="text" name="student_image_url" placeholder="Enter student image url"  />
                    @csrf
                    <button type="submit">Create new </button>
                </form>
                @endsection

