@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

<div class="flex title-line">
    <h2>@lang('admin.order-service'){{$customers->id}}</h2>
</div>

<div class="order-product-wrapper">
    <div class="contacts-table-wrap">
        <table class="contacts-table">
            <tr>
                <td class="table-desc">@lang('admin.contacts')</td>
            </tr>
            <tr>
                <td>@lang('utge.firstname'):</td>
                <td>{{$customers->firstname}}</td>
            </tr>
            <tr>
                <td>@lang('utge.lastname'): </td>
                <td>{{$customers->lastname}}</td>
            </tr>
            <tr>
                <td>@lang('admin.phone'): </td>
                <td> {{$customers->phone}}</td>
            </tr>
            <tr>
                <td>@lang('admin.city')</td>
                <td>{{$customers->city}}</td>
            </tr>
            <tr>
                <td>@lang('admin.adress')</td>
                <td>{{$customers->adress_delivery}}</td>
            </tr>
            <tr>
                <td>@lang('utge.delivery')</td>
                @switch($customers->delivery_type)
                    @case('nova')
                        <td>@lang('admin.nova-poshta')</td>
                        @break
                    @case('ind')
                        <td>@lang('admin.ind-delivery')</td>
                        @break
                    @case('adres')
                        <td>@lang('admin.adres-delivery')</td>
                        @break
                    @case('int')
                        <td>@lang('admin.intime')</td>
                        @break
                    @case('avl')
                        <td>@lang('admin.avtolux')</td>
                        @break
                    @default
                @endswitch
            </tr>

            <tr>
                <td>@lang('admin.payment')</td>
                @switch($customers->payment_type)
                    @case('cash')
                        <td>@lang('admin.cash')</td>
                        @break
                    @case('privat')
                        <td>@lang('admin.privat')</td>
                        @break
                    @case('cart')
                        <td>@lang('admin.cart')</td>
                        @break
                    @default
                @endswitch
            </tr>

        </table>
        <form id="services-form" class="services-order-form" action="{{ route('productsOrder.update', $customers->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="order-select-wrap">
                <select name="status">

                    @if($customers->status == 0)

                    <option selected value="0">Не опрацьоване замовення</option>
                    <option value="1">Опрацьоване замовення</option>

                    @elseif ($customers->status == 1)

                    <option value="0">Не опрацьоване замовення</option>
                    <option selected value="1">Опрацьоване замовення</option>

                    @endif

                </select>


            </div>

            <button for="services-form" type="submit">@lang('admin.change')</button>


        </form>
    </div>
    <div>
        <table class="order-list-table">
            <tr>
                <td class="table-desc">@lang('admin.order-product-list')</td>
            </tr>
            @foreach ($orders as $order)
                @foreach ($products as $product)
                    @php
                        $title = $product->localization[0];
                        $description = $product->localization[1];
                    @endphp
                    @if ($order->product_id == $product->id)
                    <tr>
                        <td><img class="order-product-img" src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label></td>
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
                <td>@lang('admin.total_price')</td>
                <td>{{array_sum($gen_price)}}</td>
            </tr>
        </table>
    </div>
</div>

<div>

</div>

@endsection

