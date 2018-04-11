@extends('dashboard.layout')

@section('sidebar')
@include('dashboard.instructor.sidebar')
@endsection

@section('content')

    @include('dashboard.instructor.alllessonsofspecificcourse')
@endsection
