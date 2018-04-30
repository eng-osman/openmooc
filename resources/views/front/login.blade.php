<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('front/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('front/js/html5shiv.js')}}"></script>
    <script src="{{asset('front/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">
    <form class="form-signin" action="{{url('login')}}" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        @if(isset($error))
            <p>{{$error}}</p>
        @endif
        <div class="login-wrap">
            <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="User Name" autofocus>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
            <input type="checkbox" name="remember" value="remember-me"> Remember me
            <span class="pull-right">
                    <a data-toggle="modal" href="#"> Forgot Password?</a>
                </span>
            {{csrf_field()}}
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="{{url('register')}}">
                    Create an account
                </a>
            </div>
        </div>
    </form>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>

</body>
</html>