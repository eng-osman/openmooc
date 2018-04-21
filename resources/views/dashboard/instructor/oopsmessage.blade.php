
@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.instructor.sidebar')
@endsection

@section('content')

<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong> Warning !</strong> Course Not Found .
</div>

@endsection