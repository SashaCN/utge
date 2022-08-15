@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

<div class="flex title-line">
    <h2>@lang('admin.order-list')</h2>
</div>

<table class="product-table">
    <thead>
        <tr>
            <th>@lang('admin.number')</th>
            <th>@lang('admin.fio')</th>
            <th>@lang('admin.contacts')</th>
            <th>@lang('admin.status')</th>
            <th>@lang('admin.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productsOrder as $order)
            @if($order->deleted_at == NULL)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <p>{{ $order->firstname }}</p>
                        <p>{{ $order->lastname }}</p>
                    </td>
                    <td>{{ $order->phone }}</td>
                    @if ($order->status == 0)
                        <td class="order-status">
                            <p>@lang('admin.order-new')</p>
                        </td>
                    @elseif($order->status == 2)
                        <td class="order-status-two">
                            <p>@lang('admin.order-in-processing')</p>
                        </td>
                    @elseif ($order->status == 1)
                        <td class="order-status-one">
                            <p>@lang('admin.order-processed')</p>
                        </td>
                    @endif
                    <td class="action">
                        <a title="Редагувати" href="{{ route('productsOrder.edit', $order->id) }}"></a>
                        <a title="Видалити" href="{{ route('productsOrder.delete', $order->id) }}"></a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@endsection

