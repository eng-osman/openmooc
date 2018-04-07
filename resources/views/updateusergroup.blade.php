@extends('mooc')
@section('title')
    page title
@endsection
@section('page_head')
    <h1>Update category</h1>
@endsection
@section('content')
    <form action="{{url('updateusergroup')}}" method="post">
        @foreach($userGroups as $userGroup)
            group_name <input type="text" name="group_name" value="{{$userGroup->group_name}}"><br />
            <input type="hidden" name="group_id" value="{{$userGroup->group_id}}">
       @endforeach

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <button type="submit">update User Group</button>
    </form>
@endsection