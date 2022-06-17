<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simpleVisualTextEditor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                    <a href="#" class="add drop-btn">@lang('admin.add')</a>

                    <div class="add-menu drop-list hidden">
                        <ul>
                            <li><a href="{{ route('product.create') }}">@lang('admin.product')</a></li>
                            <li><a href="{{ route('subCategory.create') }}">@lang('admin.sub_category_add')</a></li>
                            <li><a href="{{ route('category.create') }}">@lang('admin.category')</a></li>
                            <li><a href="{{ route('productType.create') }}">@lang('admin.product_type')</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <p class="lang-select">
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
        <p class="logo">
            <a href="{{ route('index') }}" class="flex">
                <img src="{{ asset('img/logo.png') }}" alt="Hashtag logo">
            </a>
        </p>
        <nav>
            <ul class="aside-menu">
                <li><a href="{{ route('product.index') }}"><span class="link-text">@lang('admin.products')</span></a></li>
                <li>
                    <a href="#" class="drop-`"><span class="link-text">@lang('admin.categories')</span></a>

                    <div class="drop-list hidden">
                        <ul>
                            <li><a href="{{ route('category.index') }}">@lang('admin.categories')</a></li>
                            <li><a href="{{ route('subCategory.create') }}">2</a></li>
                            <li><a href="{{ route('category.create') }}">3</a></li>
                            <li><a href="{{ route('productType.create') }}">4</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#"><span class="link-text">@lang('admin.orders')</span></a></li>
                <li><a href="{{ route('news.index') }}"><span class="link-text">@lang('admin.news')</span></a></li>
                <li><a href="{{ route('childPage.index') }}"><span class="link-text">@lang('admin.modules')</span></a></li>
                <li><a href="{{ route('seo.index') }}"><span class="link-text">SEO</span></a></li>
                <li><a href="{{ route('trashBox.index') }}"><span class="link-text">@lang('admin.trash_box')</span></a></li>
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
    <script src="{{ asset('js/lang.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}" type="module"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
</body>
</html>
