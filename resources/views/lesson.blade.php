<html>
<head>

</head>
<body>

<form action="{{url('addlesson')}}" method="post">
    lesson title <input type="text" name="lesson_title"><br/>
    <input type="hidden" value="1" name="lesson_course">
    <input type="hidden" value="3" name="lesson_instructor">
    lesson description <input type="text" name="lesson_description"><br/>
    lessonvideo <input type="text" name="lesson_video"><br/>
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <button type="submit">Add lesson</button>
</form>
</body>

</html>