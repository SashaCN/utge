@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

<div class="flex title-line">
    <h2>@lang('admin.order-service'){{$productsOrder->id}}</h2>
</div>



@endsection

