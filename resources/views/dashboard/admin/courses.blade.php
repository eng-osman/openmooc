@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    All Courses
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>category</th>
                                <th>Is Active</th>
                                <th>instructor</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="3">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->category_name}}</td>
                                    <td>@if($course->is_active == 1) Active @else Not Active @endif</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->created_at}}</td>
                                    <td>{{$course->updated_at}}</td>

                                    <td><button type="button" class="btn btn-primary"><a href="{{url('admin/lessons/'.$course->course_id)}}">Lessons</a></button></td>

                                    <td><button type="button" class="btn btn-primary"><a href="{{url('admin/courses/'.$course->course_id.'/edit')}}">Update</a></button></td>
                                    <td><button type="button" class="btn btn-danger"><a href="{{url('admin/courses/'.$course->course_id)}}">Delete</a></button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@endsection