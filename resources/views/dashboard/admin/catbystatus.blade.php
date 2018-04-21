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
                    Categories
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="3">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>

                                    @if($category->is_active == 1)
                                        <td><a class="btn btn-info" href="{{url('admin/catbystatus/'.$category->category_id).'/0'}}">deactivate</a></td>
                                    @else
                                        <td><a class="btn btn-success" href="{{url('admin/catbystatus/'.$category->category_id).'/1'}}">Active</a></td>
                                    @endif
                                    <td><a class="btn btn-primary" href="{{url('admin/categories/'.$category->category_id.'/edit')}}">Update</a></td>
                                    <td>
                                        <form action="{{url('admin/categories/'.$category->category_id)}}" method="POST">
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