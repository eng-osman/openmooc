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
                                <th>Date</th>
                                <th colspan="2">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscribe as $sub)
                                <tr>
                                    <td>{{$sub->course_name}}</td>
                                    <td>{{$sub->name}}</td>
                                    <td>{{$sub->created_at}}</td>

                                    <td><a class="btn btn-success" href="{{url('admin/approved/'.$sub->id).'/1'}}"> Approve </a></td>
                                    <td>
                                        <form action="{{url('admin/subscribe/'.$sub->id)}}" method="POST">
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