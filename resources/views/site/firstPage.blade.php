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
            <h2>@lang('utge.slider-feed')</h2>
            <div class="slider-line">
                <div class="slide slide-preview">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#cow') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="fish">
            <h2>@lang('utge.slider-fish')</h2>
            <div class="slider-line">
                <div class="slide slide-preview">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#fish') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="water">
            <h2>@lang('utge.slider-product')</h2>
            <div class="slider-line">
                <div class="slide slide-preview">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#goods') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="service">
            <h2>@lang('utge.slider-service')</h2>
            <div class="slider-line">
                <div class="slide slide-preview">
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#man') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
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
                    <figure class="product shadow-box">
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
                    <figure class="product shadow-box out-of-store">
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
            {{ $products->withQueryString()->links('vendor.pagination.utge-pagination') }}
        </div>
    </div>
</div>


@endsection
