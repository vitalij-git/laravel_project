<table>
    <tr>
        <th>
            {{_('ID')}}
        </th>
        <th>
            {{_('Name')}}
        </th>
        <th>
            {{_('Surname')}}
        </th>
        <th>
            {{_('Email')}}
        </th>
        <th>
            {{_('Phone')}}
        </th>
    </tr>
    <tr>
        <td>
            {{$owner->id}}
        </td>
        <td>
            {{$owner->name}}
        </td>
        <td>
            {{$owner->surname}}
        </td>
        <td>
            {{$owner->email}}
        </td>
        <td>
            {{$owner->phone}}
        </td>
    </tr>
</table>
