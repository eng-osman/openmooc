<h2>add new subscriptions</h2>
<form action="" method="post">
    <label for="stu">Select Student</label>
    <select name="student" id="stu">
        @foreach($students as $stu)
            <option value="{{$stu->id}}">{{$stu->username}}</option>
        @endforeach
    </select> <br><br>

    <label for="course">Select Student</label>
    <select name="course" id="course">
        @foreach($courses as $course)
            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
        @endforeach
    </select> <br><br>
    {{csrf_field()}}
    <input type="submit" name="save" value="Add">
</form>