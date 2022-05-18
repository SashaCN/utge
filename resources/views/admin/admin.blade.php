<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Utge admin</title>
</head>
<body>
    <div>
        <a href="{{route('admin.index')}}">product list</a>
        <a href="{{route('admin.create')}}">create</a>
    </div>
    <div>
        <section id="content">
            @yield('content')
        </section>
    </div>
</body>
</html>
