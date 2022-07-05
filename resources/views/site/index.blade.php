@php
    $locale = app()->getLocale();
@endphp

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($seos as $seo)
        @php
            $title_seo = $seo->localization[0];
            $og_title_seo = $seo->localization[1];
            $desc_seo = $seo->localization[2];
            $og_desc_seo = $seo->localization[3];
            $key_seo = $seo->localization[4];
            $custom_seo = $seo->localization[5];
        @endphp


        @switch(Request::url() == $seo->route)

            @case("http://utge/news")
            @case("http://utge/products")
            @case("http://utge/contacts")
            @case("http://utge/home")
            @case("http://utge/deliveriesAndPayments")

                <title>{{$title_seo->$locale}}</title>
                <meta property="og:url" content="{{ Request::url() }}">
                <meta property="og:title" content="{{ $og_title_seo->$locale }}">
                <meta property="og:description" content="{{ $og_desc_seo->$locale }}">
                <meta property="og:type" content="website">
                <meta property="og:img" content="public\img\logo.png">
                <meta name="description" content="{{ $desc_seo->$locale }}">
                <meta name="keywords" content="{{ $key_seo->$locale }}">
                {!! htmlspecialchars_decode($custom_seo->$locale) !!}
                @break

            @default

        @endswitch

    @endforeach
    @yield('seo')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="info-line flex-sb">
                <div class="phone flex-aic">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                        <use xlink:href="{{ asset('img/sprite.svg#tel') }}"></use>
                    </svg>
                    <ul class="phone-list">
                        @foreach ($phones as $item)
                            @php
                                $phone = $item->localization[0];
                                $phoneHref = preg_replace( "/[^0-9]/" , '' , $phone->$locale );
                            @endphp
                        <li><a href="tel:+{{ $phoneHref }}">{{ $phone->$locale }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="logo">
                    <a class="flex-col" href="{{ route('index') }}">

                        {{-- <img src="{{ asset('img/logo.png') }}" alt="@lang('utge.logo')" /> --}}

                        @foreach ($logoImg as $item)
                            
                            <img src="{{ $item->getFirstMediaUrl('images') }}" alt="@lang('utge.logo')" />
                        @endforeach

                        @foreach ($logoName as $item)
                            @php
                                $name = $item->localization[0];
                            @endphp
                            <h1>{{ $name->$locale }}</h1>
                        @endforeach
                    </a>
                </div>
                <div class="control flex-sb">
                    <a href="{{ route('basket') }}" class="basket">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                            <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                        </svg>
                    </a>
                    <a href="#" class="like">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
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
                                <use xlink:href="{{ asset('img/sprite.svg#uk_flag') }}"></use>
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
                                <use xlink:href="{{ asset('img/sprite.svg#uk_flag') }}"></use>
                            </svg>
                            <span>РУС</span>
                        </a>
                        @endif
                        <script src="{{ asset('js/lang.js') }}"></script>
                    </p>
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="#" class="burger-btn">
                <span class="menu-text">@lang('utge.menu')</span>
                <span class="burger"></span>
            </a>
            <nav>
                <span class="close"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                    <use xlink:href="{{ asset('img/sprite.svg#close') }}"></use>
                </svg></span>
                <div class="wrapper">
                    <ul class="flex-sb">
                        <li><a href="{{ route('index') }}">@lang('utge.main')</a></li>
                        <li><a href="{{ route('products') }}">@lang('utge.goods')</a></li>
                        <li><a href="{{ route('services') }}">@lang('utge.services')</a></li>
                        <li><a href="{{ route('deliveriesAndPayments') }}">@lang('utge.delivery-payment')</a></li>
                        <li><a href="{{ route('news') }}">@lang('utge.news')</a></li>
                         <li><a href="{{ route('contacts') }}">@lang('utge.contacts')</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="wrapper">
            <div class="info-line flex-sb">
                <div class="phone flex-aic">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                        <use xlink:href="{{ asset('img/sprite.svg#tel') }}"></use>
                    </svg>
                    <ul class="phone-list">
                        @foreach ($phones as $item)
                            @php
                                $phone = $item->localization[0];
                                $phoneHref = preg_replace( "/[^0-9]/" , '' , $phone->$locale );
                            @endphp
                            <li><a href="tel:+{{ $phoneHref }}">{{ $phone->$locale }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="address flex-aic">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                        <use xlink:href="{{ asset('img/sprite.svg#gps') }}"></use>
                    </svg>
                    <address>
                        @foreach ($footerPlace as $item)
                            @php
                                $place = $item->localization[0];
                            @endphp
                                {!! $place->$locale !!}
                        @endforeach
                    </address>
                </div>
                <div class="mail flex-aic">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events">
                        <use xlink:href="{{ asset('img/sprite.svg#email') }}"></use>
                    </svg>
                        @foreach ($email as $item)
                            @php
                                $email = $item->localization[0];
                            @endphp
                            <a href="mailto:{{ $email }}">{{ $email->$locale }}</a>
                        @endforeach
                </div>
            </div>
            <p class="copy">&copy; utge since 2016</p>
        </div>
    </footer>

<script src="{{ asset('js/public.js') }}"></script>

</body>

</html>
