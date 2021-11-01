<h1>Statistics</h1>
<table>
    <tr>
        <th>
            {{_('Tasks statisctics')}}
        </th>
        <th>
            {{_('Owners statisctics')}}
        </th>
        <th>{{_('Types statisctics')}}</th>
    </tr>
    <tr>
     <td>
        {{$tasks->count()}}
     </td>
     <td>
         {{$owners->count()}}
     </td>
     <td>
         {{$types->count()}}
     </td>
    </tr>
</table>
