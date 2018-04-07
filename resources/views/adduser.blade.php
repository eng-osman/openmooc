@extends('mooc')
@section('content')
    <form action="{{url('users')}}" method="post">
        username <input type="text" name="username" ><br />
        name <input type="text" name="name" ><br />
        email <input type="text" name="email" ><br />
        password <input type="password" name="password" ><br />
       About <textarea name="about"></textarea><br>
        user group <select name="user_group">


            @foreach($userGroups as $userGroup)
                <option value="{{$userGroup->group_id}}">{{$userGroup->group_name}}</option>
            @endforeach
        </select><br />
        Is Active? <select name="active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select><br />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Add user</button>
    </form>
@endsection