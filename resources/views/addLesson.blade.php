@extends('mooc')
@section('title')
    page title
@endsection
@section('page_head')
    <h1>Add Lesson</h1>
@endsection
@section('content')
    <form action="{{url('addlesson')}}" method="post">
        Title <input type="text" name="lesson_title"><br />
        lesson_Vedio <input type="text" name="lesson_video"><br />
       lesson_course <select name="lesson_course">
            @foreach($courses as $course)
                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
            @endforeach
        </select><br />
        lesson_instructor <select name="lesson_instructor">
            @foreach($instructors as $instructor)
                <option value="{{$instructor->id}}">{{$instructor->name}}</option>
            @endforeach
        </select><br />
        lesson_description <textarea name="lesson_description"></textarea><br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Add course lesson</button>
    </form>
@endsection