<html>
<head>
    <title>Mooc @yield('title')</title>
</head>
<body>

@yield('page_head')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@yield('content')


</body>
</html>