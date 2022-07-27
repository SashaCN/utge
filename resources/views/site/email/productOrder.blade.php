<table>
    <table style="width: 600px; margin: 0 auto; font-family: sans-serif; background: #003b95; color: #fff;">
        <tr>
            <td style="padding: 15px; text-align:center;"><img src="{{ asset('img/logo.png') }}" alt=""></td>
        </tr>
    </table>

    <table style="width: 600px; margin: 0 auto; padding: 25px; font-family: sans-serif; background: #003b95; color: #fff;">
        <tr>
            <td style="padding: 15px; font-weight:bold">Замовлення №{{ $customers->id }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Ім'я:</td>
            <td style="padding: 15px">{{ $customers->firstname }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Фамілія:</td>
            <td style="padding: 15px">{{ $customers->lastname }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Номер телефону:</td>
            <td style="padding: 15px">{{ $customers->phone }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Адреса:</td>
            <td style="padding: 15px">{{ $customers->city }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Спосіб доставки:</td>
            @switch($customers->delivery_type)
                @case('nova')
                    <td class="table-desc-contact">@lang('admin.nova-poshta')</td>
                    @break
                @case('ind')
                    <td class="table-desc-contact">@lang('admin.ind-delivery')</td>
                    @break
                @case('adres')
                    <td class="table-desc-contact">@lang('admin.adres-delivery')</td>
                    @break
                @case('int')
                    <td class="table-desc-contact">@lang('admin.intime')</td>
                    @break
                @case('avl')
                    <td class="table-desc-contact">@lang('admin.avtolux')</td>
                    @break
                @case('ukr')
                    <td class="table-desc-contact">@lang('admin.ukr-poshta')</td>
                    @break
                @default
            @endswitch
        </tr>
        <tr>
            <td style="padding: 15px">Адреса доставки:</td>
            <td style="padding: 15px">{{ $customers->adress_delivery }}</td>
        </tr>
        <tr>
            <td style="padding: 15px">Спосіб оплати:</td>
            @switch($customers->payment_type)
                @case('cash')
                    <td class="table-desc-contact">@lang('admin.cash')</td>
                    @break
                @case('privat')
                    <td class="table-desc-contact">@lang('admin.privat')</td>
                    @break
                @case('cart')
                    <td class="table-desc-contact">@lang('admin.cart')</td>
                    @break
                @default
            @endswitch
        </tr>
    </table>
    <table style="width: 600px; padding: 25px; margin: 0 auto; font-family: sans-serif; background: #003b95; color: #fff;">
        <tr>
            <td style="padding: 15px">Список замовлення:</td>
        </tr>
        <tr>
            <td style="padding: 15px">Товар</td>
            <td style="padding: 15px">Кількість</td>
            <td style="padding: 15px">Ціна за одиницю</td>
            <td style="padding: 15px">Загальна ціна</td>
        </tr>

    @foreach ($orders as $order)
        @foreach ($products as $product)
            @php
                $title = $product->localization[0];
                $description = $product->localization[1];
            @endphp
            @if ($order->product_id == $product->id)
            <tr>
                {{-- <td><img class="order-product-img" src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label></td> --}}
                <td>{{ $title->$locale }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->top_price }}</td>
                @php
                $gen_price[] = $order->top_price;
                @endphp
            </tr>
            @endif
        @endforeach
    @endforeach
    <tr>
        @if (!isset($gen_price))
            <td class="table-desc-total-price">@lang('admin.total_price')</td>
        @else
            <td class="table-desc-total-price">@lang('admin.total_price')</td>
            <td class="table-desc-total-price">{{array_sum($gen_price)}}</td>
        @endif
    </tr>
    </table>
    <table style="width: 600px; padding: 25px; margin: 0 auto; font-family: sans-serif; background: #003b95; color: #fff;">
        <tr>
            <td style="padding: 15px; text-align:center;"><a style="color: black; padding: 15px; background: #fff; text-decoration:none" href="{{ route('productsOrder.index') }}">Відкрити в адмін-панелі</a></td>
        </tr>
    </table>

</table>