@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
    <!--state overview start-->
    <section class="panel">
        <header class="panel-heading">
            Update Lesson
        </header>
        <div class="panel-body">
            <form  action="{{url('admin/lessons')}}" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" name="lesson_title" value="{{$lesson['lesson_title']}}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <textarea name="lesson_description" class="form-control" rows="7">{{$lesson['lesson_description']}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Video</label>
                    <input type="text" name="lesson_video" value="{{$lesson['lesson_video']}}" class="form-control" id="exampleInputEmail1">
                </div>

                {{csrf_field()}}
                <input type="hidden" name="lesson_course" value="{{$lesson['lesson_course']}}">
                <input type="hidden" name="lesson_instructor" value="{{$lesson['lesson_instructor']}}">
                <input type="hidden" name="lesson_id" value="{{$lesson['lesson_id']}}">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </form>
        </div>
    </section>
    <!--state overview end-->
@endsection