@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Add Category
        </header>
        <div class="panel-body">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <form  action="{{url('admin/categories')}}" method="post" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                    <select name="is_active" class="form-control">
                        <option value="0">Not Active</option>
                        <option value="1">Active</option>
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