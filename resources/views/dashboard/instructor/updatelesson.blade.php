@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')

    <section class="panel">
        <header class="panel-heading">
           Update Form
        </header>
        <div class="panel-body">

            <form role="form" action="{{url('updatelesson')}}" method="post">
                @foreach($courseLessons as $courseLesson)
                    <label >Title</label>
                     <input type="text"class="form-control" id="exampleInputEmail1" name="lesson_title" value="{{$courseLesson->lesson_title}}"><br/>
                        <label >lesson_Vedio</label><br>
                         <input type="text"class="form-control" name="lesson_video" value="{{$courseLesson->lesson_video}}"><br/>
                        <label > lesson_description</label><br>
                       <textarea class="form-control" name="lesson_description" cols="150" rows="10"
                               >{{$courseLesson->lesson_description}}</textarea><br>
                        <input type="hidden" name="lesson_id" value="{{$courseLesson->lesson_id}}">
                @endforeach

                    <label > lesson_course</label><br>
                    <select class="form-control" name="lesson_course">
                        @foreach($courses as $course)
                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                        @endforeach
                    </select><br/>


                    <input type="hidden" name="_token" value="{{csrf_token()}}">


                <button type="submit" class="btn btn-info">Update Lesson</button>
            </form>

        </div>
    </section>
@endsection