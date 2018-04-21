@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Created At</th>
                        <th>Subscription</th>
                        <th>Rates</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$course->course_name}}</td>
                            <td>{{date("d-m-Y", strtotime($course->created_at))}}</td>
                            <td><a class="btn btn-primary" href="{{url('student/course/'.$course->course_id).'/subscribe'}}">View Subscribe</a></td>
                            <td><a class="btn btn-primary" href="{{url('student/course/'.$course->course_id).'/rate'}}">View Rate</a></td>

                        </tr>
                    </tbody>
                </table>

            </section>

        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading text-center text-danger">
                    <h1>Course Lessons</h1>
                </header>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><h3>Lessons Title</h3></th>
                        <th><h3>View Lesson</h3> </th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td class="panel-heading  ">{{$lesson->lesson_title}}</td>
                                <td><a class="btn btn-primary" href="{{url('student/course/lessons/'.$lesson->lesson_id)}}">View Lesson</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@endsection
