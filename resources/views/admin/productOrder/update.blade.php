@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

<div class="flex title-line">
    <h2>@lang('admin.order-service'){{$customers->id}}</h2>
</div>

<div>
    <table>

        <tr>
            <td>{{$customers->firstname}}</td>
        </tr>
        <tr>
            <td>{{$customers->lastname}}</td>
        </tr>
        <tr>
            <td>{{$customers->phone}}</td>
        </tr>
        <tr>
            <td>{{$customers->city}}</td>
        </tr>
        <tr>
            <td>{{$customers->adress_delivery}}</td>
        </tr>
        <tr>
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
    <table>
        @foreach ($orders as $order)
            @dump($order->product)
        @endforeach
    </table>
</div>

<div>

</div>

@endsection

