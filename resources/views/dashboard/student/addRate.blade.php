@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading text-center text-success" style="font-weight: bold">
                    Subscription Now To Your Favourite Courses
                </header>
                <div class="panel-body">
                    <form role="form" action="{{url('student/courses/rates/{id}/add')}}" method="post">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Vote Your Rate</label>
                        <select class="form-control input-lg m-bot15" name="rate">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Select Course</label>
                        <select class="form-control input-lg m-bot15" name="course_id">
                            @foreach($courses as $course)
                            <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Rate Comment</label>
                        <textarea  class="form-control" name="rate_comment"  rows="10" placeholder="Enter Your Comment"></textarea>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="student_id" value="1">
                        <button type="submit" class="btn btn-info">Add Rate</button>
                    </form>

                </div>
            </section>
        </div>

    </div>
@endsection
