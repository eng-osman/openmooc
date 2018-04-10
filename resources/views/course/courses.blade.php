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
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($coursesList as $course)
                        <tr>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->category_name}}</td>
                            <td>{{$course->course_description}}</td>
                            @if($course->is_active == 1)
                                <td>Active</td>
                                @else
                                <td>Not active</td>
                            @endif
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{url('courses/edit/'.$course->course_id)}}"><i class="fa fa-pencil-square"></i> edit</a>
                                <a class="btn btn-danger btn-sm" href="{{url('courses/delete/'.$course->course_id)}}"><i class="fa fa-trash-o"></i> delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</div>
@endsection
