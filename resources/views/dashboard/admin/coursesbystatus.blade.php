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
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->created_at}}</td>
                                    <td>{{$course->updated_at}}</td>
                                    <td>
                                    @if($course->is_active == 0)
                                        <a class="btn btn-success" href="{{url('admin/active/'.$course->course_id)}}" style="color: #fff"> Active </a>
                                    @elseif($course->is_active == 1)
                                        <a class="btn btn-info" style="color: #fff" href="{{url('admin/deactivate/'.$course->course_id)}}">dectivate</a>
                                    @endif
                                    <a class="btn btn-danger" style="color: #fff" href="{{url('admin/delete/'.$course->course_id)}}">Delete</a>
                                    </td>
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