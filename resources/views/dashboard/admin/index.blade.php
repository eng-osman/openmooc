@extends('dashboard.layout')

@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection

@section('content')
<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-user"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    {{$usernum}}
                </h1>
                <p>Users</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-bars"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    {{$categoriesnum}}
                </h1>
                <p>Categories</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-laptop"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    {{$coursesnum}}
                </h1>
                <p>Courses</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    {{$subscribenum}}
                </h1>
                <p>Subscribe</p>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->
@endsection
