<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
</head>
<body>
<h1> Portale moodle </h1>

@auth
    <p> Ciao, {{  auth()->user()->name }}!</p>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
@endauth
</body>
</html>
