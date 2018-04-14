@extends('instructor.layout')
@section('title') my courses @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">My courses</header>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($coursesList)
                        @foreach($coursesList as $course)
                            <tr>
                                <td><a href="{{url('students/'.$course->course_id)}}">{{$course->course_name}}</a></td>
                                <td>{{$course->category_name}}</td>
                                <td>{{$course->course_description}}</td>
                                @if($course->is_active == 1)
                                    <td>Active</td>
                                @else
                                    <td>Not active</td>
                                @endif
                                <td>


                                    <button class="btn btn-primary btn-xs"><a href="{{url('courses/edit/'.$course->course_id)}}" ><i class="fa fa-pencil"></i></a></button>
                                    <button class="btn btn-danger btn-xs"><a href="{{url('courses/delete/'.$course->course_id)}}"><i class="fa fa-trash-o "></i></a></button>
                                    <button class="btn btn-success btn-xs"><a href="{{url('lesson')}}/{{$course->course_id}} "><i class="fa fa-eye"></i>Lessons</a></button>

                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">no courses for this instructor</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>




</div>
@endsection
