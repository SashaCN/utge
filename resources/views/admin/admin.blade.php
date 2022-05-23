<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Utge admin</title>
</head>
<body>
    <header>
        <div class="header-line flex">
            <ul class="header-menu flex">
                <li class="logo">
                    <a href="{{ route('admin') }}">
                        <img src="{{ asset('img/logo.svg') }}" alt="Hashtag logo">
                    </a>
                </li>
                <li class="li-home">
                    <a href="#" class="home">UTGE</a>
                    <span></span><span></span><span></span><span></span>
                </li>
                <li class="li-add">
                    <a href="#" class="add">Додати</a>
                    <span></span><span></span><span></span><span></span>
                    <div class="add-menu hidden">
                        <ul>
                            <li><a href="{{ route('product.create') }}">Товар</a></li>
                            {{-- <li><a href="{{ route('productType.create') }}">тип продукта</a></li> --}}
                            <li><a href="{{ route('category.create') }}">Категорію</a></li>
                            <li><a href="{{ route('subCategory.create') }}">доп категорії</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="lang flex">
                <li><a href="#">ru</a></li>
                <span class="vertical-line">|</span>
                <li><a href="#">ua</a></li>
            </ul>
        </div>
    </header>
    <aside>
        <nav>
            <ul class="aside-menu">
                <li><a href="{{ route('product.index') }}">Товари</a><span></span><span></span><span></span><span></span></li>
                {{-- <li><a href="{{ route('productType.index') }}">тип продукта</a><span></span><span></span><span></span><span></span></li> --}}
                <li><a href="{{ route('category.index') }}">Категорії</a><span></span><span></span><span></span><span></span></li>
                <li><a href="{{ route('subCategory.index') }}">доп категорії</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">Замовлення</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">Новини</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">Модулі</a><span></span><span></span><span></span><span></span></li>
            </ul>
        </nav>
    </aside>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
