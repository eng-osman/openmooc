@extends('instructor.layout')
@section('title') my students @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">MY Students</header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                           <tr>
                               <th>Student name</th>
                               <th>Student status</th>
                               <th>Course name</th>
                               <th>course status</th>
                               <th>Subscription status</th>
                               <th>Control</th>
                           </tr>
                        </thead>
                        <tbody>
                        @if($students)
                            @foreach($students as $stu)
                             <tr>
                            <td>{{$stu->username}}</td>
                            <td>@if($stu->user_status==1) Active @else Un active @endif</td>
                            <td>{{$stu->course_name}}</td>
                            <td>@if($stu->course_status==1) Active @else Un active @endif</td>
                            <td>@if($stu->is_approved==1)Approved @else Un approved @endif</td>
                           <td>
                               @if($stu->is_approved==1)
                                   <a class="btn-sm btn-warning" href="{{url('subscription/unapprove/'.$stu->subscription_id)}}">Un Approve</a>
                               @else
                                   <a class="btn-sm btn-success" href="{{url('subscription/approve/'.$stu->subscription_id)}}">Approve</a>
                               @endif
                                   <a class="btn-sm btn-danger" href="{{url('subscription/delete/'.$stu->subscription_id)}}">delete</a>
                           </td>
                        </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">No students subscriptions for this instructor</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
 @endsection