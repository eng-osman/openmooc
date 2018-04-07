@extends('mooc')
@section('content')
    <form action="{{url('addusergroup')}}" method="post">

        group_name <input type="text" name="group_name"  ><br />

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <button type="submit">Add user Group</button>
    </form>
@endsection