@extends('mooc')
@section('content')
    <form action="{{url('updateUserPassword')}}" method="post">
       @foreach($user as $u)
        password <input type="password" name="password" value="{{$u->password}}" ><br />
        <input type="hidden" name="id" value="{{$u->id}}">

@endforeach



        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <button type="submit">Update User Password</button>
    </form>
@endsection