@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <section class="panel">
        <div class="panel-body">
            <div class=" form">
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/users/'.$user->id)}}" novalidate="novalidate">
                    <div class="form-group">
                        {{method_field('PUT')}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <label for="cname" class="control-label col-lg-2">UserName (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control valid" value="{{$user->username}}" id="cname" name="username" minlength="2" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">name (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control valid" value="{{$user->name}}" id="cname" name="name" minlength="2" required="" type="text">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">image (required)</label>
                        <div class="col-lg-10">
                            <span class="btn btn-success fileinput-button" style="background-color:#25f525">
                                <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add image...</span>
                                <input name="image"  multiple="" type="file">
                            </span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control error" value="{{$user->email}}" id="cemail" name="email" required="" type="email"><label for="cemail" class="error">Please enter a valid email address.</label>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="curl" class="control-label col-lg-2">password (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control" value="{{$user->password}}" id="curl" name="password" type="password">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Group (required)</label>
                        <div class="col-lg-10">
                            <select name="user_group" style="padding: 1%;">
                                @foreach ($groups as $group)
                                    @if($group->group_id == $user->user_group)
                                        <option selected value="{{$group->group_id}}">{{$group->group_name}}</option>
                                    @else
                                        <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">about (required)</label>
                        <div class="col-lg-10">
                            <input class="form-control" value="{{$user->about}}" id="ccomment" name="about" required="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="ccomment" class="control-label col-lg-2">Active (required)</label>
                        <div class="col-lg-10">
                            <select name="is_active" style="padding: 1%;">
                                @if($user->is_active == 1)
                                    <option value="1" selected >yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="0" selected>No</option>
                                    <option value="1" >yes</option>
                                @endif
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

@endsection