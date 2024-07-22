<table>
    <thead>
    <tr>
        <th>
            Code
        </th>
        <th>
            Name
        </th>
        <th>
            First name
        </th>
        <th>
            Contact
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($entries as $entry)
        <tr>
            <td>
                {{$entry->code}}
            </td>
            <td>
                {{$entry->name}}
            </td>
            <td>
                {{$entry->firstname}}
            </td>
            <td>
                {{$entry->contact}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
