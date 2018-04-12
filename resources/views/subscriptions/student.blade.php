<title>student subscriptions</title>
<table>
    <thead>
    <tr>
        <th>username</th>
        <th>course name</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student as $s)
        <tr>
            <td>{{$s->username}}</td>
            <td>{{$s->course_name}}</td>
            @if($s->is_approved == 1)
                <td>Aproved</td>
                @else
                <td>Un Approved</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
