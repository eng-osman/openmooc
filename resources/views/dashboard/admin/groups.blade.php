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
                    Users Groups
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="2">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$group->group_name}}</td>
                                <td>{{$group->created_at}}</td>
                                <td>{{$group->updated_at}}</td>

                                <td><button type="button" class="btn btn-primary"><a href="{{url('admin/groups/'.$group->group_id.'/edit')}}">Update</a></button></td>
                                <td><button type="button" class="btn btn-danger"><a href="{{url('admin/groups/'.$group->group_id)}}">Delete</a></button></td>
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