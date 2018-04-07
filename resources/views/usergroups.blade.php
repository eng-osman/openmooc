<html>
<head>
    <title>Our user Groups</title>
</head>
<body>
<h1>All user Groups</h1>
<ul>
    @foreach($userGroupsList as $userGroup)

            <li>{{$userGroup->group_name}}</li>

    @endforeach
</ul>
</body>
</html>