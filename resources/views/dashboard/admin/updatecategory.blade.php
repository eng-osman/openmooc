@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Update Category
        </header>
        <div class="panel-body">
            <form  action="{{url('admin/categories')}}" method="post" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="category_name" value="{{$category['category_name']}}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" @if($category->is_active == 1) selected @endif>Active</option>
                        <option value="0" @if($category->is_active == 0) selected @endif>Not Active</option>
                    </select>
                </div>
                {{csrf_field()}}
                <input type="hidden" name="created_by" value="1">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </section>
    <!--state overview end-->
@endsection