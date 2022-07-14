@extends('admin.admin')

@section('content')

<div class="flex title-line">
    <h2>@lang('admin.order-service'){{ $servicesOrder->id }}</h2>

</div>

    <p>{{ $servicesOrder->firstname }}</p>

@endsection
