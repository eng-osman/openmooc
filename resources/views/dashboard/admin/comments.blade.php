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
                                <th>Comment </th>
                                <th>created by</th>
                                <th>Lesson</th>
                                <th>Date</th>
                                <th>Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->lesson_title}}</td>
                                    <td>{{$comment->created_at}}</td>

                                    <td>
                                        <a class="btn btn-danger" href="{{url('admin/deletecomment/'.$comment->comment_id)}}">Delete</a>
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