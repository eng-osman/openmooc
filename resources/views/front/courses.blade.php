<html>
    <head>
        <title>Our courses</title>
    </head>
    <body>
        <h1>All Courses</h1>
        <ul>
            @foreach($coursesList as $course)
                <li>{{$course->course_name}}</li>
            @endforeach
        </ul>
    </body>
</html>