@extends('site.index')

<?php
$locale = app()->getLocale();
?>

@section('content')
    <div class="wrapper">
        <div class="grid">
            @foreach ($slidersName as $slidersNameKey => $sliderOrder)
                <section class="slider-section">
                    <div class="slider-line">
                        <div class="container">
                            @foreach ($sliders as $slider)
                                @if ($slidersNameKey == $slider->route)
                                    @php
                                        $title = $slider->localization[0];
                                        $link = $slider->localization[1];
                                    @endphp

                                    <div class="slide">
                                        <a href="http://{{ $link->$locale }}"></a>
                                        <h2>{{ $title->$locale }}</h2>
                                        <img src="{{ $slider->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="slider-control">
                    </div>
                </section>
            @endforeach
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

    @if ($products[0])
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
                            if ($product->sizeprices->whereIn('available', [1, 4])->min('price')) {
                                $min_price = $product->sizeprices->whereIn('available', [1, 4])->min('price');
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
                        <a
                            href="{{ route('product', ['id' => $product->id, 'price' => $min_price], $product->localization[0]) }}">

                            <figure class="product product_id shadow-box flex-col {{ $available }}"
                                data-product-id="{{ $product->id }}">
                                <div class="stretch-wrap">
                                    <p class="status">@lang('admin.' . $available)</p>
                                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                                </div>
                                <figcaption>
                                    <h3>{{ $title->$locale }}</h3>
                                    <div class="description">{!! $description->$locale !!}</div>
                                    <p class="description active-size">
                                        @if ($product->mass_id == 1)
                                            @lang('admin.massa_neto'):
                                        @endif{{ $product->sizeprices->where('price', $min_price)->first()->size }}
                                    </p>
                                    <div class="button-line flex-sb">
                                        <p class="add-to-basket flex-aic">
                                            <svg>
                                                <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                            </svg>
                                            <span>
                                                @lang('utge.add-to-basket')
                                            </span>
                                        </p>
                                        <p class="price"><span
                                                class="active-price">{{ $min_price }}</span>
                                            {{ $product->sizeprices->where('price', $min_price)->first()->price_units }}
                                        </p>
                                        <span class="like add-to-favourite">
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
    @else
    @endif


    {{-- <div class="add-to-basket-popup">
    <div class="close-basket-popup-btn"><span></span><span></span></div>
    <p>@lang('utge.add-to-basket-popup')</p>
</div> --}}
    @if ($done == 'true')
        <div id="popupBox" class="orderPopup" style="display: flex;">
            <div class="basket-popup" id="popup">
                <div class="basket-popup-img">
                    <img src="{{ asset('img/basket-popup-img.png') }}" alt="basket popup img">
                </div>
                <h3>дякуємо за замовлення!</h3>
                <a href="{{ route('index') }}" class="send-order-btn">повернутися до покупок</a>
            </div>
            <div id="popupCloseBox"></div>
        </div>
        <script>
            localStorage.removeItem('basketProduct');
        </script>
    @endif
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection
