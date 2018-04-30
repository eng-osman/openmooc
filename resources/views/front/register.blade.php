<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="">

    <title>Register</title>

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
    <form class="form-signin" action="{{url('register')}}" method="post">
        <h2 class="form-signin-heading">register now</h2>
        <div class="login-wrap">
            <p>Enter your details </p>
            @if(count($errors)>0)
            <ul>
                @foreach($errors as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" autofocus>
            <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="User Name" autofocus>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" autofocus>
            <textarea name="about" class="form-control">{{ old('about') }}</textarea>
            <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
            {{csrf_field()}}
            <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

            <div class="registration">
                Already Registered.
                <a class="" href="{{url('login')}}">Login</a>
            </div>
        </div>
    </form>
</div>

</body>
</html>