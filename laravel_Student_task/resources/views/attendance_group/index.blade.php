
        @extends('layouts.app')

        @section('content')
            <a href="{{route('attendance_group.create')}}" class="btn btn-primary create-btn" >Create</a>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Difficulty</th>
                    <th>School</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                @foreach ($attendanceGroups as $attendance_group)
                    <tr>
                        <td>{{ $attendance_group->id }}</td>
                        <td><a href="{{route('attendance_group.show', [$attendance_group])}}">{{ $attendance_group->name }}</a></td>
                        <td>{{ $attendance_group->difficulty }} </td>
                        <td>{{ $attendance_group->school_id }} </td>
                        <td><a href="{{route('attendance_group.edit',[$attendance_group])}}" class="btn btn-primary">Edit</a></td>
                        <td><form action="{{route('attendance_group.destroy', [$attendance_group])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete</button>
                        </form></td>
                    </tr>
                @endforeach


            </table>
            @endsection
