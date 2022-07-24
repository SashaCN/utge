@extends('site.index')

<?php
    $locale = app()->getLocale();
?>

@section('content')
<div class="wrapper">
    <div class="grid">
        @if (isset($slider1[0]) == true && !empty($slider1[0]))
            <section class="feed">
                <div class="slider-line">
                    <div class="container">
                        @foreach ($slider1 as $item)
                            @php
                                $title = $item->localization[0];
                                $link = $item->localization[1];
                            @endphp

                            <div class="slide">
                                <a href="http://{{ $link->$locale }}"></a>
                                <h2>{{ $title->$locale }}</h2>
                                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{$title->$locale }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-control">
                </div>
            </section>
        @endif
        @if (isset($slider2[0]) == true && !empty($slider2[0]))
            <section class="fish">
                <div class="slider-line">
                    <div class="container">
                        @foreach ($slider2 as $item)
                            @php
                                $title = $item->localization[0];
                                $link = $item->localization[1];
                            @endphp
                            <div class="slide">
                                <a href="http://{{ $link->$locale }}"></a>
                                <h2>{{ $title->$locale }}</h2>
                                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-control">
                </div>
            </section>
        @endif
        @if (isset($slider3[0]) == true && !empty($slider3[0]))
            <section class="water">
                <div class="slider-line">
                    <div class="container">
                        @foreach ($slider3 as $item)
                            @php
                                $title = $item->localization[0];
                                $link = $item->localization[1];
                            @endphp
                            <div class="slide">
                                <a href="http://{{ $link->$locale }}"></a>
                                <h2>{{ $title->$locale }}</h2>
                                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-control">
                </div>
            </section>
        @endif
        @if (isset($slider4[0]) == true && !empty($slider4[0]))
            <section class="service">
                <div class="slider-line">
                    <div class="container">
                        @foreach ($slider4 as $item)
                            @php
                                $title = $item->localization[0];
                                $link = $item->localization[1];
                            @endphp
                            <div class="slide">
                                <a href="http://{{ $link->$locale }}"></a>
                                <h2>{{ $title->$locale }}</h2>
                                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="$title->$locale">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-control">
                </div>
            </section>
        @endif
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
            <a href="{{ route('product', [$product->id, $product->localization[0]->locale]) }}">
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

                <figure class="product product_id shadow-box flex-col {{ $available }}" data-product-id="{{ $product->id }}">
                    <p class="status">@lang('admin.'.$available)</p>
                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    <figcaption>
                        <h3>{{ $title->$locale }}</h3>
                        <p class="description">{!! $description->$locale !!}</p>
                        <p class="description active-size">{{ $product->sizeprices->where('price', $min_price)->first()->size }}</p>
                        <div class="button-line flex-sb">
                            <p class="add-to-basket flex-aic">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                </svg>
                                <span>
                                    @lang('utge.add-to-basket')
                                </span>
                            </p>
                            <p class="price"><span class="active-price">{{ $min_price }}</span>&nbsp;{{ $product->sizeprices->where('price', $min_price)->first()->price_units }}</p>
                            <span class="like add-to-favourite">
                                <svg width="29" height="26" viewBox="0 0 29 26" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.3601 25.93C14.3501 25.93 14.3501 25.93 14.3401 25.93C13.5101 25.92 12.7401 25.59 12.1601 25L2.5701 15.16C2.4801 15.07 2.3701 14.94 2.3001 14.86H2.2901C0.700099 12.98 -0.0599008 10.86 0.0300992 8.56C0.210099 4.01 3.7101 0.359999 8.1901 0.0699994C10.5501 -0.0800007 12.7801 0.689999 14.5101 2.23C16.1101 0.819999 18.1301 0.0199994 20.3201 0.0499994C25.0101 0.0899994 28.9001 3.99 28.9901 8.74C29.0301 10.99 28.2401 13.16 26.7501 14.83L16.5301 25.03C15.9401 25.62 15.1701 25.93 14.3601 25.93ZM4.1401 13.26L13.9101 23.29C14.0301 23.41 14.1701 23.5 14.3501 23.48C14.5101 23.48 14.6701 23.42 14.7801 23.3L24.9401 13.17C25.9701 12.01 26.5401 10.45 26.5101 8.81C26.4501 5.38 23.6601 2.56 20.2801 2.54C18.4201 2.51 16.6401 3.35 15.4401 4.81L14.5001 5.94L13.5501 4.8C12.2501 3.24 10.3601 2.42 8.3401 2.55C5.1801 2.75 2.6101 5.44 2.4801 8.67C2.4201 10.35 2.9601 11.85 4.1401 13.26Z" class="outside"/>
                                    <path d="M4.1401 13.26L13.9101 23.29C14.0301 23.41 14.1701 23.5 14.3501 23.48C14.5101 23.48 14.6701 23.42 14.7801 23.3L24.9401 13.17C25.9701 12.01 26.5401 10.45 26.5101 8.81C26.4501 5.38 23.6601 2.56 20.2801 2.54C18.4201 2.51 16.6401 3.35 15.4401 4.81L14.5001 5.94L13.5501 4.8C12.2501 3.24 10.3601 2.42 8.3401 2.55C5.1801 2.75 2.6101 5.44 2.4801 8.67C2.4201 10.35 2.9601 11.85 4.1401 13.26Z" class="inside"/>
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
@endsection
