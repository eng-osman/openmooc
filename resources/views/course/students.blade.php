@extends('instructor.layout')
@section('title') my students @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Students status</header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>status</th>
                                <th>control</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($students)
                            @foreach($students as $stu)
                                <tr>
                                    <td>{{$stu->username}}</td>
                                    <td>
                                        @if($stu->is_approved==1)
                                            Active
                                            @else
                                            Un active
                                        @endif
                                    </td>
                                    <td>
                                        @if($stu->is_approved == 1)
                                            <a class="btn btn-sm btn-warning" href="{{url('subscription/unapprove/'.$stu->id)}}">Un approve</a>
                                            @else
                                            <a class="btn btn-sm btn-success" href="{{url('subscription/approve/'.$stu->id)}}">Approve</a>
                                        @endif
                                        <a  class="btn btn-sm btn-danger" href="{{url('subscription/delete/'.$stu->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">No students in this course</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
