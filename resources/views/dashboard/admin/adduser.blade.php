@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <div class="panel-body">
            <div class=" form">
                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/users')}}" novalidate="novalidate">
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">UserName (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control valid" id="cname" name="username" minlength="2" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">name (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control valid" id="cname" name="name" minlength="2" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">image (required)</label>
                        <div class="col-lg-10">
                            <span class="btn btn-success fileinput-button" style="background-color:#25f525">
                                <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add image...</span>
                                <input name="image" multiple="" type="file">
                            </span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control  error" id="cemail" name="email" required="" type="email"><label for="cemail" class="error">Please enter a valid email address.</label>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="curl" class="control-label col-lg-2">password (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="curl" name="password" type="password">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Group (required)</label>
                        <div class="col-lg-10">
                            <select name="user_group" style="padding: 1%;">
                                @foreach ($groups as $group)
                                    <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">about (required)</label>
                        <div class="col-lg-10">
                            <textarea class="form-control " id="ccomment" name="about" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Active (required)</label>
                        <div class="col-lg-10">
                            <select name="is_active" style="padding: 1%;">
                                <option value="1">yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
    <!--state overview end-->
@endsection
