@extends('instructor.layout')
@section('title')
    Edit Course
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <section class="panel">
                <header class="panel-heading">
                    Edit course
                </header>
                <div class="panel-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    <form role="form" action="{{url('courses/edit/{id}')}}" method="post">
                        <!-- start course name -->
                        <!-- start loop for course data -->
                        @foreach($course as $course)
                        <div class="form-group">
                            <label for="name">course name</label>
                            <input type="text"  name="course_name" class="form-control" id="name" value="{{$course->course_name}}">
                        </div>
                        <!-- end course name-->

                        <!-- start course description -->
                        <div class="form-group">
                            <label for="desc">description</label>
                            <textarea id="desc" name="course_description" class="form-control" >{{$course->course_description}}</textarea>
                        </div>
                        <!-- end course description -->

                        <!-- start course status -->
                        <div class="radio">
                            <label><input type="radio" name="is_active" value="1"  {{ $course->is_active == 1 ? 'checked' : '' }} >Active</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="is_active"  value="0" {{ $course->is_active == 0 ? 'checked' : '' }}>un active</label>
                        </div>
                        <!-- end course status-->
                        <!-- start input hidden instractor and id -->
                        <input type="hidden"  name="course_instructor" value="1">
                        <input type="hidden"  name="course_id" value="{{$course->course_id}}">
                        <!-- end loop -->
                        @endforeach


                            <!-- start course category -->
                            <div class="form-group">
                                <label for="cat">category</label>
                                <select class="form-control" name="course_category" id="cat">
                                    @foreach($categories as $cat)
                                        <option  value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- end course category-->
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-info" name="submit" value="create">
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection