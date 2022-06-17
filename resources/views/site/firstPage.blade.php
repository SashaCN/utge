@extends('site.index')

<?php
    $locale = app()->getLocale();
?>

@section('phone-list')
    <ul class="phone-list">
        @foreach ($phones as $item)
            @php
                $phone = $item->localization[0];
                $phoneHref = preg_replace( "/[^0-9]/" , '' , $phone->$locale );
            @endphp
        <li><a href="tel:+{{ $phoneHref }}">{{ $phone->$locale }}</a></li>
        @endforeach
    </ul>
@endsection

@section('content')


<div class="wrapper">
    <div class="grid">
        <section class="feed">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-feed')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#cow') }}"></use>
                    </svg>
                </div>
                <div class="container">
                    <div class="slide">
                        <h2>@lang('utge.slider-feed-birds')</h2><img src="{{ asset('img/sl_birds.jpg') }}"
                            alt="@lang('utge.sl_birds')">
                    </div>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-feed-fish')</h2><img src="{{ asset('img/sl_fish.jpg') }}"
                        alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-feed-animals')</h2><img src="{{ asset('img/sl_animals.jpg') }}"
                        alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="fish">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-staves')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#fish') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-caviar')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-fish')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-canned')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="water">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-product')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#goods') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-electric')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-plumbing')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-heating')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="service">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#man') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
    </div>
</div>
<div class="about-us">
    @foreach ($about_us as $item)
        @php
            $title = $item->localization[0];
            $description = $item->localization[1];
        @endphp
        <h2 class="mb30">{{ $title->$locale }}</h2>
        <div class="wrapper">
            <div class="text-wrap shadow-box">
                <div>
                    {!! $description->$locale !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="best-goods">
    <h2 class="mb30">@lang('utge.best-produts')</h2>
    <div class="wrapper">
        <div class="goods-list flex-sb">
            @php
                $locale = app()->getLocale();
            @endphp

            @foreach ($products as $product)
                @php
                    $title = $product->localization[0];
                    $description = $product->localization[1];
                @endphp
            <a href="#">
                @if ($product->sizeprices->whereIn('available', [1,4])->min('price'))
                <figure class="product shadow-box flex-col">
                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    <figcaption>
                        <h3>{{ $title->$locale }}</h3>
                        <p class="description">{!! $description->$locale !!}</p>
                        <p class="description">{{ $product->sizeprices->whereIn('available', [1,4])->min('size') }}</p>
                        <div class="button-line flex-sb">
                            <p class="add-to-basket flex-aic">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                </svg>
                                <span>
                                    @lang('utge.add-to-basket')
                                </span>
                            </p>
                            <p class="price">{{ $product->sizeprices->whereIn('available', [1,4])->min('price') }}</p>
                            <span class="like">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                                </svg>
                            </span>
                        </div>
                    </figcaption>
                </figure>
                @else
                <figure class="product shadow-box out-of-store flex-col">
                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    <figcaption>
                        <h3>{{ $title->$locale }}</h3>
                        <p class="description">{!! $description->$locale !!}</p>
                        <p class="description">{{ $product->sizeprices->min('size') }}</p>
                        <div class="button-line flex-sb">
                            <p class="add-to-basket flex-aic">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                </svg>
                                <span>
                                    @lang('utge.add-to-basket')
                                </span>
                            </p>
                            <p class="price">{{ $product->sizeprices->min('price') }}</p>
                            <span class="like">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                                </svg>
                            </span>
                        </div>

                    </figcaption>
                </figure>
                @endif
            </a>
            @endforeach
        </div>
        <div class="pagination">
            <p class="page-link-previous"></p>
            <div class="flex-sb slider-nav">

            </div>
            <p class="page-link-next disabled"></p>
        </div>
    </div>
</div>
<script src="{{ asset('js/slider.js') }}"></script>

@endsection
