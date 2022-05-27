<!DOCTYPE html>
<html lang="{{ app()->getLocale() == 'uk' }}">
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

                <li class="li-home">
                    <a href="{{ route('admin') }}" class="home flex">
                        <img src="{{ asset('img/home.svg') }}" alt="Home">
                    </a>

                </li>
                <li class="li-add">
                    <a href="#" class="add">@lang('admin.add')</a>

                    <div class="add-menu hidden">
                        <ul>
                            <li><a href="{{ route('product.create') }}">@lang('admin.product')</a></li>
                            <li><a href="{{ route('category.create') }}">@lang('admin.category')</a></li>
                            <li><a href="{{ route('productType.create') }}">product-type</a></li>
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
                <li class="logo">
                    <a href="" class="flex">
                        <img src="{{ asset('img/logo.png') }}" alt="Hashtag logo">
                    </a>
                </li>
                <li><a href="{{ route('product.index') }}"><span class="link-text">@lang('admin.products')</span></a></li>
                <li><a href="{{ route('category.index') }}"><span class="link-text">@lang('admin.categories')</span></a></li>
                <li><a href="#"><span class="link-text">@lang('admin.orders')</span></a></li>
                <li><a href="#"><span class="link-text">@lang('admin.news')</span></a></li>
                <li><a href="#"><span class="link-text">@lang('admin.modules')</span></a></li>
            </ul>
        </nav>
        <p class="copy">
            <a href="https://hashtag.net.ua/" class="flex">
                <img src="{{ asset('img/hashtag_logo.svg') }}" alt="Hashtag logo">
            </a>
        </p>
    </aside>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
