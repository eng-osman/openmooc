<html>
    <head>
        <title>register to website</title>
    </head>
    <body>
        <h1>Register</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('register')}}" method="post">
            username <input type="text" name="username"><br />
            email <input type="text" name="email"><br />
            password <input type="text" name="password"><br />
            gender <select name="gender">
                    <option value="1">male</option>
                    <option value="0">female</option>
            </select><br />
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit">Register</button>
        </form>
    </body>
</html>