
        @extends('layouts.app')

        @section('content')
        <a href="{{route('school.create')}}" class="btn btn-primary create-btn">Create</a>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach ($schools as $school)
                    <tr>
                        <td>{{ $school->id }}</td>
                        <td><a href="{{route('school.show', [$school])}}">{{ $school->name }}</a></td>
                        <td>{{ $school->phone }} </td>
                        <td><a href="{{route('school.edit',[$school])}}" class="btn btn-primary">Edit</a></td>
                        <td><form action="{{route('school.destroy', [$school])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete</button>
                        </form></td>
                    </tr>
                @endforeach


            </table>
@endsection
