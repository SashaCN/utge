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
                            <li><a href="{{ route('subCategory.create') }}">subCategory</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <p class="lang-select">
                {{-- <option value=""></option> --}}
                @if (app()->getLocale() == 'uk')
                    <a href="{{ route('locale', 'uk') }}" class="flex lang-uk selected-lang"><img src="{{ asset('img/uk_flag.svg') }}" alt=""><span>УКР</span></a>
                    <a href="{{ route('locale', 'ru') }}" class="flex lang-ru"><img src="{{ asset('img/ru_flag.svg') }}" alt=""><span>РУС</span></a>
                @elseif(app()->getLocale() == 'ru')
                    <a href="{{ route('locale', 'uk') }}" class="flex lang-uk"><img src="{{ asset('img/uk_flag.svg') }}" alt=""><span>УКР</span></a>
                    <a href="{{ route('locale', 'ru') }}" class="flex lang-ru selected-lang"><img src="{{ asset('img/ru_flag.svg') }}" alt=""><span>РУС</span></a>
                @endif
            </p>
        </div>
    </header>
    <aside>
        <nav>
            <ul class="aside-menu">
                <li class="logo">
                    <a href="{{ route('index') }}" class="flex">
                        <img src="{{ asset('img/logo.png') }}" alt="Hashtag logo">
                    </a>
                </li>
                <li><a href="{{ route('product.index') }}"><span class="link-text">@lang('admin.products')</span></a></li>
                <li><a href="{{ route('category.index') }}"><span class="link-text">@lang('admin.categories')</span></a></li>
                <li><a href="#"><span class="link-text">@lang('admin.orders')</span></a></li>
                <li><a href="{{ route('news.index') }}"><span class="link-text">@lang('admin.news')</span></a></li>
                <li><a href="{{ route('childPage.index') }}"><span class="link-text">@lang('admin.modules')</span></a></li>
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
    <script src="{{ asset('js/simple-visual-editor.js') }}"></script>
</body>
</html>
