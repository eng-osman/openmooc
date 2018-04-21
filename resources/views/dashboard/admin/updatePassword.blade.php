@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('content')
    <section class="panel" style="padding: 10% 0%">
        <div class="panel-body">
            <div class="form" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/updatePasswrd')}}" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <label for="cname" class="control-label col-lg-2">Old Password (Option)</label>
                        <div class="col-lg-10">
                            <input style="padding: 3% 1% ; margin-bottom:1%" class="form-control valid" value="{{$user->password}}" minlength="2"  type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cname" class="control-label col-lg-2">New Password (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control valid" placeholder="New-Password" style="padding: 3% 1% ; margin-bottom:1%" id="cname" name="password" minlength="2" required="" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-danger" type="submit">Save</button>
                            <button class="btn btn-default" type="button">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection