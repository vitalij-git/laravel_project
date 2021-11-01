<table>
    <tr>
        <th>
            {{_('ID')}}
        </th>
        <th>
            {{_('title')}}
        </th>
        <th>
            {{_('Owner')}}
        </th>
        <th>
            {{_('Type')}}
        </th>
        <th>
            {{_('Start  date')}}
        </th>
        <th>
            {{_('End date')}}
        </th>
    </tr>
    <tr>
        <td>{{$task->id}}</td>
        <td>{{$task->title}}</td>
        <td>
            {{$task->ownerTask->name}}
            {{$task->ownerTask->surname}}
        </td>
        <td>{!! $task->description !!}</td>
        <td>{{$task->typeTask->title}}</td>
        <td>
            {{$task->start_date}}
        </td>
        <td>
            {{$task->end_date}}
        </td>
    </tr>
</table>
