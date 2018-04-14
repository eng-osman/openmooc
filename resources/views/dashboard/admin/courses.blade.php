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
                <!-- search -->
                <div class="panel-body">
                    <form action="coursesearch" method="get" class="form-horizontal search-result">
                        <div class="form-group">
                            <label class="col-lg-1 col-sm-1 control-label">Search</label>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" name="search" class="form-control input-medium">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn " type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                    <!-- /search -->
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

                                    <td><a class="btn btn-primary" href="{{url('admin/lessons/'.$course->course_id)}}">Lessons</a></td>

                                    <td><a class="btn btn-primary" href="{{url('admin/courses/'.$course->course_id.'/edit')}}">Update</a></td>
                                    <td>
                                        <form action="{{url('admin/courses/'.$course->course_id)}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>
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