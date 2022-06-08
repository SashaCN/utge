<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('utge.utge')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="info-line flex-sb">
                <div class="phone flex-aic">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#tel') }}"></use>
                    </svg>
                    <ul class="phone-list">
                        <li><a href="tel:+380739175254">+38 (073) 917-52-54</a></li>
                        <li><a href="tel:+380739175254">+38 (073) 917-52-54</a></li>
                    </ul>
                </div>
                <div class="logo">
                    <a class="flex-col" href="{{ route('index') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="@lang('utge.logo')" />
                        <h1>@lang('utge.utge')</h1>
                    </a>
                </div>
                <div class="control flex-sb">
                    <a href="#" class="basket">
                        <svg>
                            <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                        </svg>
                    </a>
                    <a href="#" class="like">
                        <svg>
                            <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                        </svg>
                    </a>
                    <p class="lang-select">
                        @if (app()->getLocale() == 'uk')
                        <a href="{{ route('locale', 'uk') }}" class="flex lang-uk selected-lang">
                            <svg class="flag">
                                <use xlink:href="{{ asset('img/sprite.svg#uk_flag') }}"></use>
                            </svg>
                            <span>УКР</span>
                        </a>
                        <a href="{{ route('locale', 'ru') }}" class="flex lang-ru">
                            <svg class="flag">
                                <use xlink:href="{{ asset('img/sprite.svg#ru_flag') }}"></use>
                            </svg>
                            <span>РУС</span>
                        </a>
                        @elseif(app()->getLocale() == 'ru')
                        <a href="{{ route('locale', 'uk') }}" class="flex lang-uk">
                            <svg class="flag">
                                <use xlink:href="{{ asset('img/sprite.svg#uk_flag') }}"></use>
                            </svg>
                            <span>УКР</span>
                        </a>
                        <a href="{{ route('locale', 'ru') }}" class="flex lang-ru selected-lang">
                            <svg class="flag">
                                <use xlink:href="{{ asset('img/sprite.svg#ru_flag') }}"></use>
                            </svg>
                            <span>РУС</span>
                        </a>
                        @endif
                        <script src="{{ asset('js/lang.js') }}"></script>
                    </p>
                </div>
            </div>
        </div>
        <nav class="menu">
            <div class="wrapper">
                <ul class="flex-sb">
                    <li><a href="{{ route('index') }}">@lang('utge.main')</a></li>
                    <li><a href="{{ route('products') }}">@lang('utge.goods')</a></li>
                    <li><a href="#">@lang('utge.services')</a></li>
                    <li><a href="{{ route('child', 'delivery') }}">@lang('utge.delivery')</a></li>
                    <li><a href="{{ route('news') }}">@lang('utge.news')</a></li>
                     <li><a href="{{ route('child', 'contacts') }}">@lang('utge.contacts')</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="wrapper">
            <div class="info-line flex-sb">
                <div class="phone flex-aic">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#tel') }}"></use>
                    </svg>
                    <ul class="phone-list">
                        <li><a href="tel:+380739175254">+38 (073) 917-52-54</a></li>
                        <li><a href="tel:+380739175254">+38 (073) 917-52-54</a></li>
                    </ul>
                </div>
                <div class="address flex-aic">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#gps') }}"></use>
                    </svg>
                    <address>
                        @lang('utge.address')
                    </address>
                </div>
                <div class="mail flex-aic">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#email') }}"></use>
                    </svg>
                    <a href="mailto:info@utge.net">info@utge.net</a>
                </div>
            </div>
            <p class="copy">&copy; utge since 2016</p>
        </div>
    </footer>

<script src="{{ asset('js/public.js') }}"></script>

</body>

</html>
