@extends('site.index')


@section('content')

    @php
        $locale = app()->getLocale();
        $productsData = json_decode($_GET['products']);
    @endphp


<div>
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
                        <p class="basket-clear">&nbsp;</p>
                    </div>
                @else
                    @foreach ($productsData as $productData)
                        @foreach ($products as $product)
                            @if ($product->id == $productData[0])
                                @php
                                    $title = $product->localization[0];
                                    $description = $product->localization[1];
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
                                        <p class="basket-price">{{ $min_price }} {{ $product->sizeprices->where('price', $min_price)->first()->price_units}}</p>
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
                <form class="order-form" method="POST" action="">
                    <div class="order-contacts">

                        <h3>1. Ваші контактні дані</h3>

                        <div class="basket-contacts-wrapp">

                            <div class="bascket-name">
                                <div>
                                    <label for="">@lang('utge.firstname')<span>*</span></label>
                                    <input type="text" >
                                </div>
                                <div>
                                    <label for="">@lang('utge.lastname')<span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>

                            <div class="bascket-number">
                                <label for="">@lang('utge.number-phone')<span>*</span></label>
                                <input type="text">
                            </div>

                        </div>

                        <h3>2. Доставка</h3>

                        <div class="basket-delivery">

                            <label for="">Місто<span>*</span></label>
                            <input type="text">

                            <p>Спосіб доставки<span>*</span></p>

                            <div class="basket-delivery-type">

                                <input type="radio" name="delivery_type" id="ind">
                                <label for="ind">Самовивіз</label>

                                <input type="radio" name="delivery_type" id="adres" class="adress_delivery">
                                <label for="adres">Адресна доставка по Києву</label>

                                <input type="radio" name="delivery_type" id="nova" class="post_delivery">
                                <label for="nova">Нова пошта</label>

                                <input type="radio" name="delivery_type" id="ukr" class="post_delivery">
                                <label for="ukr">Укрпошта</label>

                                <input type="radio" name="delivery_type" id="int" class="post_delivery">
                                <label for="int">Інтайм</label>

                                <input type="radio" name="delivery_type" id="avl" class="adress_delivery">
                                <label for="avl">Автолюкс</label>

                            </div>

                            <label for="">Адреса доставки<span>*</span></label>
                            <input type="text">

                        </div>

                        <h3>3. оплата</h3>

                        <div class="basket-payment-type">

                            <p>спосіб оплати<span>*</span></p>

                            <input type="radio" name="payment_type" id="cash">
                            <label for="cash">Готівка</label>

                            <input type="radio" name="payment_type" id="privat">
                            <label for="privat">Оплата на картку Приватбанку</label>

                            <input type="radio" name="payment_type" id="cart">
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

                                                <tr>
                                                    <td>{{ $title->$locale }}, {{ $min_size }} {{ $product->sizeprices->where('size', $min_size)->first()->price_units}}</td>
                                                    <td class="bold product-quantify-order"></td>
                                                    <td class="bold product-price-order"></td>

                                                    <input type="hidden" name="product_{{ $product->id }}" value="{{ $product->id }}">
                                                    <input type="hidden" name="product_{{ $product->id }}-quantify" class="product_input_quantify" value="">
                                                    <input type="hidden" name="product_{{ $product->id }}-size" value="{{ $min_size }} {{ $product->sizeprices->where('size', $min_size)->first()->price_units}}">
                                                    <input type="hidden" name="product_{{ $product->id }}-price" class="product_input_price" value="">
                                                </tr>
                                                
                                            @endif
                                        @endforeach
                                    @endforeach
                                </table>

                                <div class="price-delivery">
                                    <p>Вартість доставки</p>
                                    <p>за тарифами перевізника</p>
                                </div>

                                <div class="total-price">
                                    <p>до оплати без доставки</p>
                                    <p class="general-price"></p>
                                    <input type="hidden" name="general_price" class="product_input_general_price" value="">
                                </div>
                                <div class="btn-wrap">
                                    <button class="send-order-btn" type="submit">підтвердити замовлення</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/basket.js') }}"></script>


@endsection
