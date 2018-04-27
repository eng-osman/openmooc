@extends('dashboard.layout')
@section('extra_css')
<style type="text/css">
    .comments{
        border-bottom: 1px solid #ddd;
        margin-bottom: 20px;
        background: #fff;
        padding: 10px 20px;
    }
    .comment_title{
        font-weight: bold;
        margin-bottom: 20px;
        margin-left: 10px;
    }
    .comment_paragraph{
        margin-left: 50px;
    }
    .comments ul{
        display: inline-flex;
        list-style-type: none;
    }
    .comments ul li{
        margin-left: 10px;
        margin-top: 20px;
        float: right;
    }
</style>
@endsection

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading text-center">
                    <h2 class="  text-danger ">lesson title : {{$lesson->lesson_title}}</h2>
                </header>

                <header class="panel-heading">
                    <h3 >Title</h3>
                    <h5>{{$lesson->lesson_title}}</h5>
                </header>
                <header class="panel-heading">
                    <h3 >Course</h3>
                    <h5>{{$lesson->lesson_course}}</h5>
                </header>

                <header class="panel-heading">
                    <h3 >Instructor</h3>
                    <h5>{{$lesson->lesson_instructor}}</h5>
                </header>


                <header class="panel-heading">
                    <h3 >Video</h3>
                    <h5>{{$lesson->lesson_video}}</h5>
                </header>

                <header class="panel-heading">
                    <h3 >Description</h3>
                    <h5>{{$lesson->lesson_description}}</h5>
                </header>
            </section>
        </div>

        <div class="col-sm-12">
            <h1 class="comment_title"><i class="fa  fa-comments"></i> Comments</h1>
            @foreach($comments as $comment)
                <div class="comments">
                    <div>
                        <h3 class="text-primary comment_title">{{$comment->username}}</h3>
                        <h4 class="comment_paragraph"><i class="fa  fa-comments"></i> {{$comment->comment}}</h4>
                        @if($comment->created_by == 1)
                            <ul class="">
                                <li><a class="btn btn-danger" href="{{url('student/course/lessons/delete/'.$comment->comment_id)}}">delete comment</a></li>
                                <li><a class="btn btn-success" href="{{url('student/course/lessons/update/'.$comment->comment_id)}}">update comment</a></li>
                            </ul>
                            @else
                        @endif
                    </div>
                </div>
                @endforeach

            <form role="form" action="{{url('student/course/lessons/'. $lesson->lesson_id)}}" method="post">
                <h1>add comment</h1>
                <textarea class="form-control" name="comment" rows="10" placeholder="Write Comment"></textarea>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="created_by" value="1">
                <input type="hidden" name="lesson_id" value="{{$lesson->lesson_id}}">
                <button type="submit" class="btn btn-primary">add comment</button>
            </form>
        </div>
    </div>
@endsection
