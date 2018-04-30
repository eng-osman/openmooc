@extends('front.layout')

@section('content')
    <!--categories start-->
    <div class="category-box">
        <div class="container">
            <div class="text-center feature-head">
                <h1>{{$course->name}} Course</h1>
            </div>
        </div>
    </div>
    <!--categories end-->
    <!--container start-->
    <div class="container">
        <div class="line"></div>
        <!--courses start-->
        <div class="feature-head">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="course">
                            @if(file_exists('uploads/courses'.$course->course_cover))
                                <img src="{{asset('uploads/courses'.$course->course_cover)}}" alt="">
                            @else
                                <img src="{{asset('uploads/courses/img.jpg')}}" alt="">
                            @endif
                    </div>
                </div>

                <div class="col-lg-9 col-sm-9">
                    <div class="course-info">
                        <p>{{$course->course_name}} </p>
                        <a href="{{url('course/'.$course->course_id)}}"></a>
                        <p>Instructor : <a href="{{url('profile/'.$course->course_instructor)}}">{{$course->name}}</a></p>
                        <p>Category : <a href="{{url('category/'.$course->course_category)}}">{{$course->category_name}}</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <p>Courses description</p>
                    <p>{{$course->course_description}}</p>
                    <div>
                        <a href="{{url('join/'.$course->course_id)}}" class="btn-lg btn-danger"> Join Course </a>
                    </div>
                </div>

            </div>
        <!--courses end-->
    </div>
    <!--courses end-->
    </div>
    <!--/container end-->
@endsection