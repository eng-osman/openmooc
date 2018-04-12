@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Add Course
        </header>
        <div class="panel-body">
            <form  action="{{url('admin/courses')}}" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter course title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">category</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category['category_id']}}">{{$category['category_name']}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <textarea name="description" class="form-control" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                    <select name="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">cover</label>
                    <input type="file" name="cover" id="exampleInputFile">
                    <p class="help-block">choose your file.</p>
                </div>

                {{csrf_field()}}
                <input type="hidden" name="instructor" value="1">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </section>
    <!--state overview end-->
@endsection