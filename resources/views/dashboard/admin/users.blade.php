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
                        Users
                </header>
                <!-- search -->
                <div class="panel-body">
                <form action="usersearch" method="get" class="form-horizontal search-result">
                    <div class="form-group">
                        <label class="col-lg-1 col-sm-1 control-label">Search</label>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" name="search" class="form-control input-medium">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn " type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
                <!-- /search -->
                </div>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>username</th>
                                <th>email</th>
                                <th>user group</th>
                                <th>is active</th>
                                <th colspan="2">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->group_name}}</td>
                                <td>@if($user->is_active == 1) Active @else Not Active @endif</td>

                                <td><a class="btn btn-primary" href="{{url('admin/users/'.$user->id.'/edit')}}">Update</a></td>
                                <td>
                                    <form action="{{url('admin/users/'.$user->id)}}" method="POST">
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