@extends('site.index')

@section('phone-list')
    @php
        $locale = app()->getLocale();
    @endphp
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

{{-- <script>sessionStorage['basketProducts'] = JSON.parse(localStorage.basketProduct);</script> --}}
@php
    session(['basketProducts' => 'hello']);
    dd(session('basketProducts'));
@endphp

<h2>@lang('utge.basket')</h2>
<div class="wrapper">

    <form method="POST" action="" class="basket-table">
        <div class="basket-row title-row">
            <div class="img-col col"></div>
            <div class="name-col col">
                <h4>@lang('utge.product')</h4>
            </div>
            <div class="count-col col">
                <h4>@lang('utge.quatify')</h4>
            </div>
            <div class="price-col col">
                <h4>@lang('utge.price')</h4>
            </div>
            <div class="delete-col col"></div>
        </div>
        <div class="basket-products">
            <p class="basket-clear">&nbsp;</p>
        </div>
            {{-- <div class="basket-row product-row">
                <div class="img-col col">
                    <img src="img/default_image.jpg" alt="alt">
                </div>
                <div class="name-col col">
                    <h3>IКРА ЧОРНА, ОСЕТРОВА, СОЛОНА, 50 ГРАМ</h3>
                </div>
                <div class="count-col col">
                    <button class="product-minus">-</button>
                    <label>
                        <input type="number" name="product-quantify" class="product-quantify" value="1">
                    </label>
                    <button class="product-plus">+</button>
                </div>
                <div class="price-col col">
                    <p class="basket-price">1500 грн</p>
                </div>
                <div class="delete-col col">
                    <a href="#" class="delete-product">
                        <svg>
                            <use xlink:href="{{ asset('img/sprite.svg#trashbox') }}"></use>
                        </svg>
                    </a>
                </div>
            </div> --}}
        <div class="basket-row title-row general-row">
            <div class="img-col col"></div>
            <div class="name-col col">
                <h4>@lang('utge.general')</h4>
            </div>
            <div class="count-col col">
                <h4 class="general-quantify"></h4>
            </div>
            <div class="price-col col">
                <h4 class="general-price"></h4>
            </div>
            <div class="delete-col col"></div>
        </div>
        <div class="commit-order">
            <label><input type="submit" value="@lang('utge.confirm_order')"></label>
        </div>
    </form>
    <script src="{{ asset('js/basket.js') }}"></script>

</div>
@endsection
