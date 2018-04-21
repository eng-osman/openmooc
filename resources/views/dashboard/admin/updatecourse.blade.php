@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Update Course
        </header>
        <div class="panel-body">
            <form  action="{{url('admin/courses')}}" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" name="title" value="{{$course['course_name']}}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">category</label>
                    <select name="course_category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->category_id}}" @if($category->category_id == $course['course_category']) selected @endif>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <textarea name="description" class="form-control" rows="7">{{$course['course_description']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">status</label>
                    <select name="is_active" class="form-control">
                        <option value="1" @if($course->is_active == 1) selected @endif>Active</option>
                        <option value="0" @if($course->is_active == 0) selected @endif>Not Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">cover</label>
                    <img src="{{$course['course_cover']}}"/>
                    <input type="file" name="course_cover" value="course_cover" id="exampleInputFile">
                    <p class="help-block">choose your file.</p>
                </div>
                {{csrf_field()}}
                <input type="hidden" name="course_instructor" value="{{$course['course_instructor']}}">
                <input type="hidden" name="course_id" value="{{$course['course_id']}}">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </section>
    <!--state overview end-->
@endsection