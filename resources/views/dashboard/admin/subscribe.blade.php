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
                                    <td>{{$sub->course_name}}</td>
                                    <td>{{$sub->name}}</td>
                                    <td>@if($sub->is_approved == 1) approved @else Not approved @endif</td>
                                    <td>{{$sub->created_at}}</td>

                                    <td>
                                        <a class="btn btn-danger" href="{{url('admin/subscribe/'.$sub->id)}}">Delete</a>
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