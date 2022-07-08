@extends('site.index')

<?php
    $locale = app()->getLocale();
?>

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
                @foreach ($slider1 as $item)
                    @php
                        $title = $item->localization[0];
                    @endphp   
                    <div class="slide">
                        <h2>{{ $title->$locale }}</h2>
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                    </div>
                @endforeach
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
                @foreach ($slider2 as $item)
                    @php
                        $title = $item->localization[0];
                    @endphp   
                    <div class="slide">
                        <h2>{{ $title->$locale }}</h2>
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                    </div>
                @endforeach
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
                @foreach ($slider3 as $item)
                    @php
                        $title = $item->localization[0];
                    @endphp   
                    <div class="slide">
                        <h2>{{ $title->$locale }}</h2>
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                    </div>
                @endforeach
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
                @foreach ($slider4 as $item)
                    @php
                       $title = $item->localization[0];
                    @endphp   
                    <div class="slide">
                        <h2>{{ $title->$locale }}</h2>
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                    </div>

                @endforeach
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
            <a href="{{ route('product', $product->id) }}">
                @php
                    if ($product->sizeprices->whereIn('available', [1,4])->min('price')) {
                        $min_price = $product->sizeprices->whereIn('available', [1,4])->min('price');
                    } else {
                        $min_price = $product->sizeprices->min('price');
                    }


                    if ($product->sizeprices->where('price', $min_price)->first()->available == 1) {
                        $available = 'available';
                    } elseif ($product->sizeprices->where('price', $min_price)->first()->available == 2) {
                        $available = 'not_available';
                    } elseif ($product->sizeprices->where('price', $min_price)->first()->available == 3) {
                        $available = 'waiting_available';
                    } else {
                        $available = 'available_for_order';
                    }
                @endphp
                <figure id="product" class="product shadow-box flex-col {{ $available }}" data-product-id="{{ $product->id }}">
                    <p class="status">@lang('admin.'.$available)</p>
                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    <figcaption>
                        <h3>{{ $title->$locale }}</h3>
                        <p class="description">{!! $description->$locale !!}</p>
                        <p class="description">{{ $product->sizeprices->where('price', $min_price)->first()->size }}</p>
                        <div class="button-line flex-sb">
                            <p class="add-to-basket flex-aic">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                </svg>
                                <span>
                                    @lang('utge.add-to-basket')
                                </span>
                            </p>
                            <p class="price">{{ $min_price }}&nbsp;{{ $product->sizeprices->where('price', $min_price)->first()->price_units }}</p>
                            <span class="like">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                                </svg>
                            </span>
                        </div>
                    </figcaption>
                </figure>
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
<script src="{{ asset('js/add_to_basket.js') }}"></script>

@endsection
