@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="text-center text-primary">
                    @foreach($courses as $course)
                    @endforeach
                    <h1>{{$course->category_name}}</h1>
                </header>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Course Category</th>
                        <th>Course Instructor</th>
                        <th>Course Status</th>
                        <th>Created On</th>
                        <th>Course </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->category_name}}</td>
                            <td>{{$course->username}}</td>
                            <td>@if($course->is_active == 1)active @else un active @endif</td>
                            <td>{{date("d-m-Y", strtotime($course->created_at))}}</td>
                            <td><a class="btn btn-primary" href="{{url('student/course/'.$course->course_id)}}">View Course</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@endsection
