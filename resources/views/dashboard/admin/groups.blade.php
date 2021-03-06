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
                                <th colspan="3">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$group->group_name}}</td>
                                <td>{{date("d-m-Y", strtotime($group->created_at))}}</td>
                                <td>{{date("d-m-Y", strtotime($group->updated_at))}}</td>

                                <td><a class="btn btn-primary" href="{{url('admin/groups/'.$group->group_id.'/edit')}}">Update</a></td>
                                <td>
                                    <form action="{{url('admin/groups/'.$group->group_id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                </td>
                                <td><a class="btn btn-success" href="{{url('admin/usersgroup/'.$group->group_id)}}"> Show Users </a></td>
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