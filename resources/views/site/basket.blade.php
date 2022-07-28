@extends('site.index')


@section('content')

    @php
        $locale = app()->getLocale();
        $productsData = json_decode($_POST['products']);
    @endphp


<div class="basket-page">
    <div class="basket-table">
            <h2>@lang('utge.basket')</h2>
            <div class="wrapper">
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

                @if (empty($productsData))
                    <div class="basket-products">
                        <h1 class="basket-clear">@lang('utge.basket-is-empty')</h1>
                    </div>
                @else
                    @foreach ($productsData as $productData)
                        @foreach ($products as $product)
                            @if ($product->id == $productData[0])
                                @php
                                    $title = $product->localization[0];
                                    $description = $product->localization[1];
                                    $min_size = $productData[2];
                                    $min_price = $productData[3];
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
                                            <input type="number" name="product-quantify" class="product-quantify" value="{{ $productData[1] }}">
                                        </label>
                                        <button class="product-plus">+</button>
                                    </div>
                                    <div class="price-col col">
                                        <input type="hidden" class="default-size" value="{{ $min_size }}">
                                        <input type="hidden" class="default-price" value="{{ $min_price }}">
                                        <p class="basket-price">{{ $min_price }} грн</p>
                                    </div>
                                    <div class="delete-col col">
                                        <a href="#" class="delete-product">
                                            <svg>
                                                <use xlink:href="{{ asset('img/sprite.svg#trashBox') }}"></use>
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
                    <label><input type="button" id="to-order-btn" value="@lang('utge.confirm_order')"></label>
                </div>
            </div>
        </div>
        <div class="placing-an-order">
            <h2>оформлення замовлення</h2>
            <div class="wrapper">
                <form class="order-form" method="POST" action="{{ route('storeProductOrder') }}">

                    @csrf

                    <div class="order-contacts">

                        <h3>1. Ваші контактні дані</h3>

                        <div class="basket-contacts-wrapp">

                            <div class="bascket-name">
                                <div>
                                    <label for="">@lang('utge.firstname')<span>*</span></label>
                                    <input required name="firstname" type="text" >
                                </div>
                                <div>
                                    <label for="">@lang('utge.lastname')<span>*</span></label>
                                    <input required name="lastname" type="text">
                                </div>
                            </div>

                            <div class="bascket-number">
                                <label for="">@lang('utge.number-phone')<span>*</span></label>
                                <input id="popup-phone" required name="phone" type="text">
                            </div>

                        </div>

                        <h3>2. Доставка</h3>

                        <div class="basket-delivery">

                            <label for="">Місто<span>*</span></label>
                            <input name="city" type="text">

                            <p>Спосіб доставки<span>*</span></p>

                            <div class="basket-delivery-type">

                                <input required type="radio" value="ind" name="delivery_type" id="ind" class="self_delivery" checked>
                                <label for="ind">Самовивіз</label>

                                <input required type="radio" value="adres" name="delivery_type" id="adres" class="adress_delivery">
                                <label for="adres">Адресна доставка по Києву</label>

                                <input required type="radio" value="nova" name="delivery_type" id="nova" class="post_delivery">
                                <label for="nova">Нова пошта</label>

                                <input required type="radio"  value="ukr"name="delivery_type" id="ukr" class="post_delivery">
                                <label for="ukr">Укрпошта</label>

                                <input required type="radio" value="int" name="delivery_type" id="int" class="post_delivery">
                                <label for="int">Інтайм</label>

                                <input required type="radio" value="avl" name="delivery_type" id="avl" class="adress_delivery">
                                <label for="avl">Автолюкс</label>

                            </div>
                            <div class="self_delivery_label">
                                <label><div class="post_delivery_label">Номер віділення</div><div class="adress_delivery_label">Адреса доставки</div><span>*</span></label>
                                <input name="adress_delivery" type="text">
                            </div>

                        </div>

                        <h3>3. оплата</h3>

                        <div class="basket-payment-type">

                            <p>спосіб оплати<span>*</span></p>

                            <input required value="cash" type="radio" name="payment_type" id="cash" checked>
                            <label for="cash">Готівка</label>

                            <input required value="privat" type="radio" name="payment_type" id="privat">
                            <label for="privat">Оплата на картку Приватбанку</label>

                            <input required value="cart" type="radio" name="payment_type" id="cart">
                            <label for="cart">Безготівкова оплата</label>

                        </div>

                    </div>
                    <div class="order-product">
                        <div class="order-product-wrap">
                            <h3>ваше замовлення</h3>
                            <div class="order-product-inf">
                                <table class="order-product-table">

                                    @foreach ($productsData as $productData)

                                        @foreach ($products as $product)

                                        @if ($product->id == $productData[0])

                                                @php
                                                    $title = $product->localization[0];
                                                    $description = $product->localization[1];
                                                    $min_size = $productData[2];
                                                @endphp

                                                <tr class="product-tr" data-product-id="{{ $product->id }}">
                                                    <td>{{ $title->$locale }}, {{ $min_size }} {{ $product->sizeprices->where('size', $min_size)->first()->price_units}}</td>
                                                    <td class="bold product-quantify-order"></td>
                                                    <td class="bold product-price-order"></td>
                                                </tr>

                                            @endif
                                        @endforeach
                                    @endforeach

                                </table>

                                {{-- <input type="hidden" name="product" value="{{ json_encode($productsData) }}"> --}}
                                <input type="hidden" name="product" id="products" value="">


                                <div class="price-delivery">
                                    <p>Вартість доставки</p>
                                    <p>за тарифами перевізника</p>
                                </div>

                                <div class="total-price">
                                    <p>до оплати без доставки</p>
                                    <p class="general-price"></p>
                                </div>
                                <div class="btn-wrap">
                                    <button class="send-order-btn" {{--type="button"--}} type="submit" id="popupBtn">підтвердити замовлення</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="popupBox">
            <div class="basket-popup" id="popup">
                <div class="basket-popup-img">
                    <img src="{{ asset('img/basket-popup-img.jpg') }}" alt="basket popup img">
                </div>
                <h3>дякуємо за замовлення!</h3>
                <a href="{{ route('products') }}" class="send-order-btn">повернутися до покупок</a>
            </div>
            <div id="popupCloseBox"></div>
        </div>
    </div>

    <script src="{{ asset('js/site.js') }}"></script>
    <script src="{{ asset('js/basket.js') }}"></script>
    <script src="{{ asset('js/popup.js') }}"></script>

@endsection
