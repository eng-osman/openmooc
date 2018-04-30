@extends('front.layout')

@section('content')
    <!--categories start-->
    <div class="category-box">
        <div class="container">
            <div class="text-center feature-head">
                <h1>welcome to Courses Website</h1>
                <p>Choose Your speciality and start learning</p>

                <ul id="filters" class="list-unstyled">
                    @foreach($categories as $category)
                    <li><a href="{{url('category/'.$category->category_id)}}" data-filter=".design"> {{$category->category_name}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!--categories end-->

    <!--container start-->
    <div class="container">
        <div class="line"></div>
        <!--courses start-->
        <div class="text-center feature-head">
            <h1> Our Courses </h1>
        </div>
        <div class="row">
            @foreach($courses as $course)
            <div class="col-md-3">
                <div class="course-box">
                    <div class="course text-center">
                        <a href="{{url('course/'.$course->course_id)}}">
                            @if(file_exists('uploads/courses'.$course->course_cover))
                                <img src="{{asset('uploads/courses'.$course->course_cover)}}" alt="">
                            @else
                                <img src="{{asset('uploads/courses/img.jpg')}}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="course-info text-center">
                        <h4>
                            <a href="{{url('course/'.$course->course_id)}}"> {{strtoupper($course->course_name)}} </a>
                        </h4>
                        <a href="{{url('join/'.$course->course_id)}}"><p class="btn btn-danger"> Start Course </p></a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <!--courses end-->
    </div>
    <!--/container end-->
@endsection