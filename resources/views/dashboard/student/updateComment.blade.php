@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading text-center">
                    <h2 class="  text-danger ">Update Your Comment</h2>
                </header>
            </section>
        </div>

        <div class="col-sm-12">
            <form role="form" action="{{url('student/course/lessons/update/'.$comment->comment_id)}}" method="post">
                <h1>Update comment</h1>
                <textarea class="form-control" name="comment" rows="10">{{$comment->comment}}</textarea>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-primary">update comment</button>
            </form>
        </div>
    </div>
@endsection
