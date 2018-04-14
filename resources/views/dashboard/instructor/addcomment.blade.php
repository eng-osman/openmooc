@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')
    <section class="panel">
        <header class="panel-heading">
            Adding Comment Form
        </header>
        <div class="panel-body">

            <form role="form" action="{{url('addcomment')}}" method="post">
                <label>comment</label>
                <textarea type="text" class="form-control" id="exampleInputEmail1" name="comment" cols="150"
                          rows="10"></textarea><br/>
                <input type="hidden" name="lesson_id" value="{{$lesson_id}}">

                @foreach($comment as $com)
                    <input type="hidden" name="created_by" value="{{$com->id}}">
                @endforeach

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-info">Add Comment</button>
            </form>

        </div>
    </section>
@endsection