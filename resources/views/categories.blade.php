<html>
<head>
    <title>Our courses Categories</title>
</head>
<body>
<h1>All Courses Categories</h1>
<ul>
    @foreach($categriesList as $coursecategory)
   @if($coursecategory->is_active==0)
            <li>{{$coursecategory->category_name}}-{{$coursecategory->username}}-Not active</li>
@else
            <li>{{$coursecategory->category_name}}-{{$coursecategory->username}}- active</li>

        @endif


           @endforeach
</ul>
</body>
</html>