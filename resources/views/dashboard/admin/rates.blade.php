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
                                    <td>{{$rate->created_at}}</td>

                                    <td>
                                        <a class="btn btn-danger" href="{{url('admin/deleterate/'.$rate->rate_id)}}">Delete</a>
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