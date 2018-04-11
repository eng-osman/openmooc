@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')
    <section class="panel">
        <header class="panel-heading">
            Adding  Form
        </header>
        <div class="panel-body">

            <form role="form" action="{{url('addlesson')}}" method="post">
                    <label >Title</label>
                    <input type="text"class="form-control" id="exampleInputEmail1" name="lesson_title"><br/>
                    <label >lesson_Vedio</label><br>
                    <input type="text"class="form-control" name="lesson_video" ><br/>
                    <label > lesson_description</label><br>
                    <textarea class="form-control" name="lesson_description" cols="150" rows="10"
                            ></textarea><br>
                    <input type="hidden" name="lesson_instructor" value="{{$lesson_instructor}}">
                <input type="hidden" name="lesson_course" value="{{$course_id}}">


                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-info">Add Lesson</button>
            </form>

        </div>
    </section>
    @endsection