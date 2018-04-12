@extends('dashboard.500');
@section('error Type')
    Error ...!
@endsection
@section('error message')
    <ul>
    @foreach($errorMessage as $mes)
   <li> {{$mes}}</li>
    @endforeach
    </ul>
@endsection