<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>@lang('admin.utge_admin')</title>
</head>
<body>
    <header>
        <div class="header-line flex">
            <ul class="header-menu flex">
                <li class="logo">
                    <a href="{{ route('admin') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Hashtag logo">
                    </a>
                </li>
                <li class="li-home">
                    <a href="#" class="home">UTGE</a>
                    <span></span><span></span><span></span><span></span>
                </li>
                <li class="li-add">
                    <a href="#" class="add">@lang('admin.add')</a>
                    <span></span><span></span><span></span><span></span>
                    <div class="add-menu hidden">
                        <ul>
                            <li><a href="{{ route('product.create') }}">@lang('admin.product')</a></li>
                            <li><a href="{{ route('productType.create') }}">product type{{--@lang('admin.categories')--}}</a></li>
                            <li><a href="{{ route('category.create') }}">@lang('admin.category')</a></li>
                            <li><a href="{{ route('subCategory.create') }}">sub category{{--@lang('admin.categories')--}}</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="lang flex">
                <li><a href="{{ route('locale', 'ru') }}">ru</a></li>
                <span class="vertical-line">|</span>
                <li><a href="{{ route('locale', 'uk') }}">uk</a></li>
            </ul>
        </div>
    </header>
    <aside>
        <nav>
            <ul class="aside-menu">
                <li><a href="{{ route('product.index') }}">@lang('admin.products')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="{{ route('category.index') }}">@lang('admin.categories')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">@lang('admin.orders')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">@lang('admin.news')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">@lang('admin.modules')</a><span></span><span></span><span></span><span></span></li>
            </ul>
        </nav>
        <p class="copy">
            <a href="https://hashtag.net.ua/" class="flex">
                <img src="{{ asset('img/hashtag_logo.svg') }}" alt="Hashtag logo">
                <span>&copy; Hashtag</span>
            </a>
        </p>
    </aside>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
