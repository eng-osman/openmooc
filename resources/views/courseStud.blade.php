<html>
    <head>
        <title>Our courses</title>
    </head>
    <body>
        <h1>courses_Students</h1>
        <table border="1" align="center">
            <tr>
                <th>ID</th>
                <th>Student_ID</th>
                <th>users.name</th>
                <th>Course_ID</th>
                <th>course_name</th>
                <th>Is_Approved</th>
            </tr>
            @foreach($cStudent as $cStud)
                <tr>
                    <td>{{$cStud->id}}</td>
                    <td align="center">{{$cStud->student_id}}</td>
                    <td>{{$cStud->name}}</td>
                    <td align="center"><b>{{$cStud->course_id}}</b></td>
                    <td><b>{{$cStud->course_name}}<b/></td>
                    <td align="center">{{$cStud->is_approved}}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>