<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('front/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('front/js/html5shiv.js')}}"></script>
    <script src="{{asset('front/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
<!--header start-->
<header class="header-frontend">
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> Courses </a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/about')}}">About</a></li>
                    <li><a href="{{url('/contact')}}">Contact</a></li>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <li><a href="{{url('student')}}">{{Auth::user()->username}}</a></li>
                        <li><a href="{{url('logout')}}">logout</a></li>
                    @else
                        <li><a href="{{url('/register')}}">Sign Up</a></li>
                        <li><a href="{{url('/login')}}">Login</a></li>
                    @endif
                    <li><input type="text" placeholder=" Search" class="form-control search"></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--header end-->
@yield('content')
<!--footer start-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h1>contact info</h1>
                <address>
                    <p>Address: Cairo Egypt</p>
                    <p>lorem ipsum city, Country</p>

                    <p>Phone : 00000000</p>
                    <p>Email : <a href="javascript:;">info@mail.com</a></p>
                </address>
            </div>
            <div class="col-lg-5 col-sm-5">
                <h1>latest tweet</h1>
                <div class="tweet-box">
                    <i class="icon-twitter"></i>
                    <em>Please follow <a href="javascript:;">@#</a> for all future updates of us! <a href="javascript:;">twitter.com/#</a></em>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                <h1>stay connected</h1>
                <ul class="social-link-footer list-unstyled">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="text-center">
            <p>2018 &copy; All rights reserved.</p>
        </div>
    </div>
</footer>
<!--footer end-->

<!-- js files -->
<script src="{{asset('front/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/plugins.js')}}"></script>

</body>
</html>