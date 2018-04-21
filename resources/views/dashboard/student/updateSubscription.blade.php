@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading text-center text-success" style="font-weight: bold">
                    Update Subscription
                </header>
                <div class="panel-body">
                    <form role="form" action="{{url('student/addSubscription')}}" method="post">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Our Courses</label>
                        <select class="form-control input-lg m-bot15" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Subscription</label>
                        <select class="form-control input-lg m-bot15" name="is_approved">
                            <option value="1">Subscripe</option>
                            <option value="0">Remove Subscripe</option>
                        </select>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="student_id" value="1">
                        <button type="submit" class="btn btn-info">Subscripe</button>
                    </form>

                </div>
            </section>
        </div>

    </div>
@endsection
