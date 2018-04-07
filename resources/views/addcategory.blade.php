@extends('mooc')
@section('title')
    page title
@endsection
@section('page_head')
    <h1>Add category</h1>
@endsection
@section('content')
    <form action="{{url('addcategory')}}" method="post">
        category_name <input type="text" name="category_name"><br />

        created_by <select name="created_by">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select><br />
        Is Active? <select name="active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select><br />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">Add Category</button>
    </form>
@endsection