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
                                <th>Is Active</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th colspan="2">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>@if($category->is_active == 1) Active @else Not Active @endif</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>

                                    <td><button type="button" class="btn btn-primary"><a href="{{url('admin/categories/'.$category->category_id.'/edit')}}">Update</a></button></td>
                                    <td><button type="button" class="btn btn-danger"><a href="{{url('admin/categories/'.$category->category_id)}}">Delete</a></button></td>
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