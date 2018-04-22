@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="text-center">
                    <h1>Our Categories</h1>
                </header>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Catrgory Name </th>
                        <th>Instuctor Name</th>
                        <th>Course Status </th>
                        <th>Created At    </th>
                        <th>Updated At    </th>
                        <th>View          </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->username}}</td>
                        <td>@if($category->is_active == 1)active @else un active @endif</td>
                        <td>{{date("d-m-Y", strtotime($category->created_at))}}</td>
                        <td>{{date("d-m-Y", strtotime($category->updated_at))}}</td>
                        <td><a class="btn btn-primary" href="{{url('student/categories/'.$category->category_id).'/courses'}}">View Courses</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@endsection
