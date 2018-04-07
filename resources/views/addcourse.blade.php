@extends('mooc')
@section('title')
    Add Course
@endsection
@section('page_head')
    <h1>Add Course</h1>
@endsection
@section('content')
    <form action="{{url('addcourse')}}" method="post">
        course_name <input type="text" name="course_name"><br />
        course_category <select name="course_category">
            @foreach($categories as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
        </select><br />
        course_instructor <select name="course_instructor">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select><br />
        course_description <textarea name="course_description"></textarea><br>
        </select><br />
        Is Active? <select name="active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select><br />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Add course </button>
    </form>
@endsection