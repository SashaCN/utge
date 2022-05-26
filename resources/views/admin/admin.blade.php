<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
<<<<<<< HEAD
                <li class="logo">
                    <a href="/">
                        <img src="{{ asset('img/logo.png') }}" alt="Hashtag logo">
                    </a>
                </li>
=======
                
>>>>>>> 14d489f08f4d5e499c01eda934c6b347ab03dbfd
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
<<<<<<< HEAD
                <li><a href="{{ route('product.index') }}">@lang('admin.products')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="{{ route('category.index') }}">@lang('admin.categories')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="#">@lang('admin.orders')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="{{ route('news.index') }}">@lang('admin.news')</a><span></span><span></span><span></span><span></span></li>
                <li><a href="{{ route('childPage.index') }}">@lang('admin.modules')</a><span></span><span></span><span></span><span></span></li>
=======
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
>>>>>>> 14d489f08f4d5e499c01eda934c6b347ab03dbfd
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
