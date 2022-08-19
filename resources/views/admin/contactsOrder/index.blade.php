@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

<div class="flex title-line">
    <h2>@lang('utge.contacts')</h2>
</div>

<table class="product-table">
    <thead>
        <tr>
            <th>@lang('admin.number')</th>
            <th>@lang('admin.fio')</th>
            <th>@lang('admin.contacts')</th>
            <th>@lang('admin.interes-service')</th>
            <th>@lang('admin.status')</th>
            <th>@lang('admin.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($serviceOrders as $order)
            @if($order->deleted_at == NULL)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                    @if ($order->email == null)
                        <td><p>тел: {{ $order->phone }}</p></td>
                    @else
                        <td>
                            <p>тел: {{ $order->phone }}</p>
                            <p>e-mail: {{ $order->email }}</p>
                        </td>
                    @endif
                    <td>
                        {{ substr($order->interes, 0, 55) . '...' }}
                    </td>
                    @if ($order->status == 0)
                        <td class="order-status">
                            <p>@lang('admin.message-new')</p>
                        </td>
                    @elseif($order->status == 1)
                        <td class="order-status-two">
                            <p>@lang('admin.message-in-processing')</p>
                        </td>
                    @elseif ($order->status == 2)
                        <td class="order-status-one">
                            <p>@lang('admin.message-processed')</p>
                        </td>
                    @endif
                    <td class="action">
                        <a title="Редагувати" href="{{ route('editContacts', $order->id) }}"></a>
                        <a title="Видалити" href="{{ route('servicesOrder.delete', $order->id) }}"></a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection
