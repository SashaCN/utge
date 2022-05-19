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
    <div class="admin-wrapp">
        <div class="admin-wrapp-aside">
            <ul>
                <li><a href="{{ route('product.index') }}">Товари</a></li>
                <li><a href="{{ route('product.create') }}">Додати товар</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('category.index') }}">Категорії</a></li>
                <li><a href="{{ route('category.create') }}">Додати категорії</a></li>
            </ul>
            <ul>
                {{-- <li><a href="{{ route('admin.index') }}">Доп категорії</a></li>
                <li><a href="{{ route('admin.create') }}">Додати доп категорії</a></li> --}}
            </ul>
        </div>
        <div class="admin-wrapp-content">
            @yield('content')
        </div>
    </div>
</body>
</html>
