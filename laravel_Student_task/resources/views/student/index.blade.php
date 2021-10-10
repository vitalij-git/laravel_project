@extends('layouts.app')

@section('content')
<a href="{{route('student.create')}}" class="btn btn-primary create-btn">Create</a>
            <table class="table ">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Group_id</th>
                    <th scope="col">image_url</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>

                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td><a href="{{route('student.show', [$student])}}">{{ $student->name }}</a></td>
                        <td>{{ $student->surname }} </td>
                        <td>{{ $student->group_id }} </td>
                        <td>{{ $student->image_url }} </td>
                        <td><a href="{{route('student.edit',[$student])}}" class="btn btn-primary">Edit</a></td>
                        <td><form action="{{route('student.destroy', [$student])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Delete</button>
                        </form></td>
                    </tr>
                @endforeach


            </table>
            @endsection
