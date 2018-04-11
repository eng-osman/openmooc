@extends('instructor.layout')
@section('title')
    Add Course
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <section class="panel">
                <header class="panel-heading">
                    Add new course
                </header>
                <div class="panel-body">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    <form role="form" action="{{url('courses/create')}}" method="post">
                        <!-- start course name -->
                        <div class="form-group">
                            <label for="name">course name</label>
                            <input type="text"  name="name" class="form-control" id="name">
                        </div>
                        <!-- end course name-->

                        <!-- start course category -->
                        <div class="form-group">
                            <label for="cat">category</label>
                            <select class="form-control" name="category" id="cat">
                                @foreach($categories as $cat)
                                    <option  value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end course category-->

                        <!-- start course instructor -->
                        <div class="form-group">
                            <label for="ins">instructor</label>
                            <select class="form-control" name="instructor" id="ins">
                                @foreach($instructors as $instructor)
                                    <option value="{{$instructor->id}}">{{$instructor->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end course instructor -->

                        <!-- start course description -->
                        <div class="form-group">
                            <label for="desc">description</label>
                            <textarea id="desc" name="description" class="form-control"></textarea>
                        </div>
                        <!-- end course description -->

                        <!-- start course status -->
                        <div class="radio">
                            <label><input type="radio" name="status" value="1">Active</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="status"  value="0">un active</label>
                        </div>
                        <!-- end course status-->
                        {{csrf_field()}}
                        <input type="submit" class="btn btn-info" name="submit" value="create">
                    </form>

                </div>
            </section>
        </div>
    </div>
@endsection