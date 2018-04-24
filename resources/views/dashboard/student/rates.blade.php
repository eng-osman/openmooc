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
                    Rates
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Rate </th>
                                <th>created by</th>
                                <th>Course</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rates as $rate)
                                <tr>
                                    <td>{{$rate->rate}}</td>
                                    <td>{{$rate->name}}</td>
                                    <td>{{$rate->course_name}}</td>
                                    <td>{{$rate->rate_comment}}</td>
                                    <td>{{date("d-m-Y", strtotime($rate->created_at))}}</td>
                                    @if($rate->student_id == 1)
                                    <td><a class="btn btn-danger" href="{{url('student/courses/rates/'.$rate->rate_id).'/delete'}}">Delete</a></td>
                                    @else
                                        no rate
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{url('student/courses/rates/'. $rate->course_id .'/add')}}">add rates </a>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
@endsection
