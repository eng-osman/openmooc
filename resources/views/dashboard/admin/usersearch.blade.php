@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <section id="no-more-tables">
                            <table class="table table-bordered table-striped table-condensed cf">
                                <thead class="cf">
                                <tr>
                                    <th>#</th>
                                    <th class="numeric">UserName</th>
                                    <th class="numeric">Name</th>
                                    <th class="numeric">Image</th>
                                    <th class="numeric">E-mail</th>
                                    <th class="numeric">UserGroup</th>
                                    <th class="numeric">about</th>
                                    <th class="numeric">Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td data-title="Code">{{$user->id}}</td>
                                        <td data-title="Company">{{$user->username}}</td>
                                        <td class="numeric">{{$user->name}}</td>
                                        <td class="numeric">{{$user->image}}</td>
                                        <td class="numeric">{{$user->email}}</td>
                                        <td class="numeric">{{$user->user_group}}</td>
                                        <td class="numeric">{{$user->about}}</td>
                                        <td class="numeric">
                                                <a class="btn btn-success" href="{{url('admin/active/'.$user->id)}}" style="color: #fff"> Active </a>
                                            <a class="btn btn-danger" style="color: #fff" href="{{url('admin/delete/'.$user->id)}}">Danger</a>
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
    </section>
@endsection