@extends('mooc')

@section('content')
        <form action="{{url('add')}}" method="post">
            title <input type="text" name="title"><br />
            Description <textarea cols="200" rows="5" name="description"></textarea><br />
            category <select name="category">
                        @foreach($categories as $cat)
                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                        @endforeach
                    </select><br />
            Is Active? <select name="active">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select><br />
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="instructor" value="1">
            <button type="submit">Add Course</button>
        </form>
@endsection