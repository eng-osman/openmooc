<title>All subscriptions</title>
<table>
    <thead>
    <tr>
        <th>subscription id</th>
        <th>student id</th>
        <th>student name</th>
        <th>course id</th>
        <th>course name</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($all as $a)
    <tr>
        <td>{{$a->id}}</td>
        <td>{{$a->student_id}}</td>
        <td>{{$a->username}}</td>
        <td>{{$a->course_id}}</td>
        <td>{{$a->course_name}}</td>
        @if($a->is_approved == 1)
            <td>Active</td>
            @else
            <td>Un Active</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>