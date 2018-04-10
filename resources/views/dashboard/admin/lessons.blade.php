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
      
                    <div>
                        lessons
                    </div>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>description</th>
                                <th>Created At</th>
                                <th colspan="3">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{$lesson->lesson_title}}</td>
                                    <td>{{$lesson->lesson_description}}</td>
                                    <td>{{$lesson->created_at}}</td>

                                    <td><button type="button" class="btn btn-primary"><a href="{{url('admin/courses/'.$lesson->lesson_id.'/edit')}}">Update</a></button></td>
                                    <td>
                                        <form action="{{url('admin/courses/'.$lesson->lesson_id)}}" method="POST">
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