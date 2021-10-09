
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
                            <form action="{{route('school.store')}}" method="POST">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="school_name" class="form-control" placeholder="Enter school name"  />
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Description</label>
                                    <input type="text" name="school_description" class="form-control" placeholder="Enter school description"  />
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Place</label>
                                    <input type="text"  class="form-control" name="school_place" placeholder="Enter school place" />
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="school_phone" placeholder="Enter school phone" />
                                </div>
                                @csrf
                                <button type="submit" class="btn btn_primary">Create new </button>
                                <a href="{{route('school.index')}}" class="btn btn-primary">Back</a>
                            </form>
                        </div>

                        @endsection
