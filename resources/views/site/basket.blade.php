@extends('site.index')

@php
    $locale = app()->getLocale();
@endphp

@section('content')

@php
    $productsJs = json_decode($_GET['products']);
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
        @if (empty($productsJs))
            <div class="basket-products">
                <p class="basket-clear">&nbsp;</p>
            </div>
        @else

            @foreach ($productsJs as $id)
                @foreach ($products as $product)
                    @if ($product->id == $id[0])
                        @php

                            $title = $product->localization[0];
                            $description = $product->localization[1];

                        @endphp

                        <div class="basket-row product-row" data-product-id="{{ $product->id }}">
                            <div class="img-col col">
                                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                            </div>
                            <div class="name-col col">
                                <h3>{{ $title->$locale }}</h3>
                            </div>
                            <div class="count-col col">
                                <button class="product-minus">-</button>
                                <label>
                                    <input type="number" name="product-quantify" class="product-quantify" value="1">
                                </label>
                                <button class="product-plus">+</button>
                            </div>
                            <div class="price-col col">
                                <p class="basket-price">{{ $product->sizeprices->where('size', $id[1])->first()->price }} {{ $product->sizeprices->where('size', $id[1])->first()->price    _units}}</p>
                            </div>
                            <div class="delete-col col">
                                <a href="#" class="delete-product">
                                    <svg>
                                        <use xlink:href="{{ asset('img/sprite.svg#trashbox') }}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    @endif
                @endforeach
            @endforeach
        @endif
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

    <script src="{{ asset('js/add_to_basket.js') }}"></script>
    <script src="{{ asset('js/basket.js') }}"></script>

</div>
@endsection
