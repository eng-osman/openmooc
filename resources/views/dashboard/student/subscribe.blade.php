@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    subscribe
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Course </th>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribe as $sub)
                                <tr>
                                    @if($sub->student_id == 1)
                                    <td>{{$sub->course_name}}</td>
                                    <td>{{$sub->username}}</td>
                                        <td>@if($sub->is_approved == 1) approved @else Not approved @endif</td>
                                        <td>{{$sub->created_at}}</td>
                                        <td>

                                            @if($sub->is_approved == 1)
                                                <a class="btn btn-danger" href="{{url('student/courses/subs/'.$sub->id).'/delete'}}">Remove</a>
                                            @else
                                                <a class="btn btn-success" href="{{url('student/courses/subs/'.$sub->id).'/aprove'}}">subscribe</a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{url('student/courses/subs/add')}}">add subscribe</a>

                        </div>

                    </section>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@endsection
