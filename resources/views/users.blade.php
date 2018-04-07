<html>
<head>
    <title>Our users</title>
</head>
<body>
<h1>All Our users</h1>
<ul>
    @foreach($usersList as $user)
        @if($user->is_active==0)
            <li>{{$user->username}}-{{$user->name}}-{{$user->email}}-{{$user->group_name}}-Not active</li>
        @else
            <li>{{$user->username}}-{{$user->name}}- {{$user->email}}-{{$user->group_name}}- active</li>

        @endif


    @endforeach
</ul>
</body>
</html>