@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Add User Group
        </header>
        <div class="panel-body">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <form  action="{{url('admin/groups')}}" method="post" role="form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="group_name" value="{{ old('group_name') }}" class="form-control" id="exampleInputEmail1">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </section>
    <!--state overview end-->
@endsection