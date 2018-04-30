@extends('front.layout')

@section('content')
<!--breadcrumbs start-->
<div class="category-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 feature-head">
                <h1>Contact</h1>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->
<!--container start-->
<div class="container">
    <div class="line"></div>
    <div class="about">
        <div class="col-lg-7 col-sm-7">
            <h4>Send a Message</h4>
            <div class="contact-form">
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" placeholder="" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Message</label>
                        <textarea placeholder="" rows="5" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-danger" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/container end-->
@endsection