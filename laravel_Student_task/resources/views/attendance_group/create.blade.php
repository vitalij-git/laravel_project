
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
                <form class="form-control" action="{{route('attendance_group.store')}}" method="POST">
                    Name: <input type="text" name="attendance_group_name" placeholder="Enter attendance_group name" />
                    Description: <input type="text" name="attendance_group_description" placeholder="Enter attendance_group description" />
                    Difficulty: <input type="number" name="attendance_group_difficulty" placeholder="Enter attendance_group difficulty"  />
                    School: <input type="text" name="attendance_group_school_id" placeholder="Enter attendance_group school_id"  />
                    @csrf
                    <button type="submit">Create new </button>
                </form>
            </div>
            @endsection
