
@extends('mooc')

@section('content')
    <form action="{{url('updateCategory')}}" method="post">
        @foreach($coursescategories as $courseCategory)
        category_name <input type="text" name="category_name" value="{{$courseCategory->category_name}}"><br />

        created by <input type="text" name="created_by" value="{{$courseCategory->username}}"><br>

        Is Active? <input type="text" name="active" value="{{$courseCategory->is_active}}"><br>
        @endforeach
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Update CourseCategory</button>
    </form>
@endsection