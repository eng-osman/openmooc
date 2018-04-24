@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="text-center">
                    <h1>Our Courses</h1>
                </header>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Course Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                        <td>{{$course->course_name}}</td>
                        <td><a class="btn btn-primary" href="{{url('student/courses/subs')}}">View Subscribe</a></td>
                        <td><a class="btn btn-primary" href="{{url('student/courses/rates')}}">View Rates </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@endsection
