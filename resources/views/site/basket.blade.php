@extends('site.index')

@section('content')

@php
    $locale = app()->getLocale();

    $productsId = explode(',', trim($_GET['products'], '[]'));
@endphp
    
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
                
                @if (empty($productsId))
                    <div class="basket-products">
                        <p class="basket-clear">&nbsp;</p>
                    </div>
                @else
                    @foreach ($productsId as $id)
                        @foreach ($products as $product)
                            @if ($product->id == $id)
                                @php
                                    $title = $product->localization[0];
                                    $description = $product->localization[1];
        
                                    $min_price = $product->sizeprices->whereIn('available', [1,4])->min('price');
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
                <form method="POST" action="">
                    <div class="basket-get-inf">
                        <h3>ваші данні</h3>
                        <div class="basket-contacts">
                            <label class="basket-name">ім'я<input type="text"></label>
                            <label class="basket-second-name">прізвище<input type="text"></label>
                            <label class="basket-number">телефон<input type="text"></label>
                        </div>
        
                        <h3>доставка</h3>
                        <div class="basket-delivery">
                            <p>місто</p>
                            <label class="basket-city"><input type="text" name="basket-city"></label>
                            <p>спосіб доставки</p>
                            <label>саменькі<input type="radio" name="basket-delivery"></label>
                            <label>адресна по києву<input type="radio" name="basket-delivery"></label>
                            <label>нова<input type="radio" name="basket-delivery"></label>
                            <label>укр<input type="radio" name="basket-delivery"></label>
                            <label>інтайм<input type="radio" name="basket-delivery"></label>
                            <label>автолюкс<input type="radio" name="basket-delivery"></label>
                        </div>
                        
                        <h3>оплата</h3>
                        <div class="basket-payment">
                            <p>спосіб оплати</p>
                            <label>готівка<input type="radio" name="basket-payment"></label>
                            <label>приват<input type="radio" name="basket-payment"></label>
                            <label >без готівки<input type="radio" name="basket-payment"></label>
                        </div>
        
                    </div>
                    <div class="basket-your-order"> 
                        <h4>ваше замовлення</h4>
                        @if (empty($productsId))
                            <div class="basket-products">
                                <p class="basket-clear">&nbsp;</p>
                            </div>
                        @endif
                        <div class="commit-order">
                            <label><input type="submit" value="@lang('utge.confirm_order')"></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/basket.js') }}"></script>


@endsection
