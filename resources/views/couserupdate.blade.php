<html>
<head>

</head>
<body>

<form action="{{url('updatecourse')}}" method="post">
    title <input type="text" name="title"><br />
    Description <textarea cols="200" rows="5" name="description"></textarea><br />
    category <input type="text" name="category"><br/>
    Is Active? <select name="active">
        <option value="1">Active</option>
        <option value="0">Not Active</option>
    </select><br />

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="instructor" value="1">
    <input type="hidden" name="id" value="1">
    <button type="submit">Add Course</button>
</form>

</body>
</html>

