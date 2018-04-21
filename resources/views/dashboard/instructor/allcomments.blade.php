@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{-- @foreach($lessonsList as $lesson)--}}
                All Comments Of Selected Lesson
            </header>

            <div class="panel-body">
                <section id="no-more-tables">


                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                        <tr>
                            <th>Comment</th>
                            <th>created_by</th>
                            <th>Lesson Name</th>
                            {{--//will be link redirect to video of lesson--}}
                            <th>Control</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commentsList as $comment)
                            <tr>
                                <td data-title="Comment">{{$comment->comment}}</td>
                                <td data-title="created_by">{{$comment->name}}</td>
                                <td data-title="Lesson Name">{{$comment->lesson_title}}</td>
                                <td>
                                    <a href="{{url('updateComment')}}/{{$comment->comment_id}}" class="btn btn-info"><i
                                                class="fa fa-refresh"></i> Update</a>
                                    &nbsp &nbsp &nbsp<a href="{{url('DeleteComment')}}/{{$comment->comment_id}}"type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>

                                    </a>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </div>
</div>

<a href="{{url('addComment')}}/{{$comment->lesson_id}} "  class="btn btn-info">Add New Comment</a>

<!-- page end-->
@endsection