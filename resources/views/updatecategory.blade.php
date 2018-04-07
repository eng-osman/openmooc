@section('content')
    <form action="{{url('updateCategory')}}" method="post">
        category_name <input type="text" name="category_name" value="{{$CoursesCategories->category_name}}"><br />

        created by <select name="created_by">
            <option value="{{$Users->id}}">{{$Users->username}}</option>
            @foreach($allUsers as $user)
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select><br />
        Is Active? <select name="active">
            <option value="1">Active</option>
            <option value="0">Not Active</option>
        </select><br />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="instructor" value="1">
        <button type="submit">update CourseCategory</button>
    </form>
@endsection