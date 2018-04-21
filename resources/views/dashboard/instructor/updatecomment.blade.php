@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')

    <section class="panel">
        <header class="panel-heading">
            Update Comment Form
        </header>
        <div class="panel-body">

            <form role="form" action="{{url('updatecomment')}}" method="post">
                @foreach($courseLessonComments as $lessonComment)
                    <label >Comment</label>
                    <textarea type="text"class="form-control" id="exampleInputEmail1" name="comment"cols="150" rows="10">{{$lessonComment->comment}}</textarea><br/>
                    <input type="hidden" name="comment_id" value="{{$lessonComment->comment_id}}">
                @endforeach
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-info">Update Comment</button>
            </form>

        </div>
    </section>
@endsection