@extends('mooc')
@section('title')
    page title
@endsection
@section('page_head')
    <h1>Update category</h1>
@endsection
@section('content')
    <form action="{{url('updateCategory')}}" method="post">
        @foreach($category as $cat)
        category_name <input type="text" name="category_name" value="{{$cat->category_name}}"><br />
@endforeach
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
        <input type="hidden" name="category_id" value="{{$cat->category_id}}">
        <button type="submit">update Category</button>
    </form>
@endsection