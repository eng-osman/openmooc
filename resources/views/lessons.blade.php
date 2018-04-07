<html>
<head>
    <title>Our courses Lessons</title>
</head>
<body>
<h1> course Lessons</h1>
<ul>
    @foreach($lessonsList as $lesson)

            <li>{{$lesson->lesson_title}}-{{$lesson->course_name}}-{{$lesson->name}}</li>

    @endforeach
</ul>
</body>
</html>