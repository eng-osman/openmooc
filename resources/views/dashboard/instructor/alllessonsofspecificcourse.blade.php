<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                {{-- @foreach($lessonsList as $lesson)--}}
                All Lessons Of Selected Course
            </header>

            <div class="panel-body">
                <section id="no-more-tables">


                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                        <tr>
                            <th>Course Name</th>
                            <th>Lesson Title</th>
                            <th>Lesson Instructor</th>
                            <th>Lesson Description</th>
                            {{--//will be link redirect to video of lesson--}}
                            <th>Lesson Video</th>
                            <th>Control</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessonsList as $lesson)
                            <tr>
                                <td data-title="Course Name">{{$lesson->course_name}}</td>
                                <td data-title="Lesson Title">{{$lesson->lesson_title}}</td>
                                <td data-title="Lesson Instructor">{{$lesson->name}}</td>
                                <td data-title="Lesson Description">{{$lesson->lesson_description}}</td>
                                <td data-title="Lesson Video"><a href="#">{{$lesson->lesson_video}}</a></td>
                                <td>
                                    <a href="{{url('updateLesson')}}/{{$lesson->lesson_id}}" class="btn btn-info"><i
                                                class="fa fa-refresh"></i> Update</a>
                                    &nbsp &nbsp &nbsp<a href="{{url('DeleteLesson')}}/{{$lesson->lesson_id}}"type="button" class="btn btn-danger delete">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </a>
                                    &nbsp &nbsp<button type="button" class="btn btn-success"><i class="fa fa-eye"></i> View comments </button>

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

<a href="{{url('addLesson')}}/{{$course_id}} "  class="btn btn-info">Add New Lesson</a>

<!-- page end-->