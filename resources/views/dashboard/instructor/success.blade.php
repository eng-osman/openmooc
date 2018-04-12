@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')
    <div class="alert alert-success alert-block fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <h4>
            <i class="fa fa-ok-sign"></i>
            Success!
        </h4>
        <p>{{$message}}</p>
    </div>
    @endsection