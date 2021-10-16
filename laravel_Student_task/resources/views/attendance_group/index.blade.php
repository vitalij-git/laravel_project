
        @extends('layouts.app')

        @section('content')
            <a href="{{route('attendance_group.create')}}" class="btn btn-primary create-btn" >Create</a>
            <table class="table">
                <tr>
                    <th>{!! _('ID') !!}</th>
                    <th>{!! _('Name') !!}</th>
                    <th>{!! _('Difficulty') !!}</th>
                    <th>{!! _('School') !!}</th>
                    <th>{!! _('Edit') !!}</th>
                    <th>{!! _('Delete') !!}</th>
                </tr>

                @foreach ($attendance_groups as $attendance_group)
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
