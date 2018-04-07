@extends('mooc')
@section('content')
    <form action="{{url('updateuser')}}" method="post">
        @foreach($users as $user)
        username <input type="text" name="username"value="{{$user->username}}" ><br />
        name <input type="text" name="name"value="{{$user->name}}" ><br />
        email <input type="text" name="email" value="{{$user->email}}"><br />
        password <input type="password" name="password" value="{{$user->password}}"><br />
        About <textarea name="about">{{$user->about}}</textarea><br>
            <input type="hidden" name="id" value="{{$user->id}}">
        @endforeach
        user group <select name="user_group">


            @foreach($usersgroups as $userGroup)
                <option value="{{$userGroup->group_id}}">{{$userGroup->group_name}}</option>
            @endforeach
        </select><br />
        Is Active? <select name="active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select><br />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Update user</button>
    </form>
@endsection