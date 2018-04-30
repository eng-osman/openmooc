@extends('front.layout')

@section('content')

<!--breadcrumbs start-->
<div class="category-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 feature-head">
                <h1>About us</h1>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->
<!--container start-->
<div class="container">
    <div class="line"></div>
    <div class="row about">
        <div class="col-lg-5">
            <div class="">
                <img src="{{asset('front/images/about.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-lg-7">
            <h3>The standard Lorem Ipsum passage</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut risus eros, volutpat vel aliquam ac, condimentum eu lectus. Nam lobortis, turpis quis tincidunt suscipit, arcu odio pulvinar augue, eu fringilla sem eros sit amet elit. Sed nec condimentum libero. Suspendisse mi augue, commodo vitae tellus a, feugiat tincidunt libero. Maecenas enim turpis, fringilla vel nibh id, blandit imperdiet nunc. In ut sagittis neque, non hendrerit purus. Aenean maximus, justo et ultrices vehicula, justo lectus vestibulum ligula, quis maximus ante diam ut purus. Vestibulum ac dui condimentum, fermentum arcu in, iaculis enim.
            </p>
        </div>
    </div>
</div>

<!--/container end-->
@endsection