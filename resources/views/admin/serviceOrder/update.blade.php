@extends('admin.admin')

@section('content')

<div class="flex title-line">
    <h2>@lang('admin.order-service'){{ $servicesOrder->id }}</h2>
</div>
<div class="services-order-wrapper">
    <div class="contacts-custom">
        <div class="contacts-custom-desc">
            <p>@lang('utge.firstname') :</p>
            <p>@lang('utge.lastname') :</p>
            <p>@lang('utge.number-phone') :</span></p>
            <p>E-Mail :</span></p>
            {{-- <p>@lang('admin.status')</p> --}}
        </div>
        <div class="contacts-custom-item">
            <p>{{ $servicesOrder->firstname }}</p>
            <p>{{ $servicesOrder->lastname }}</p>
            <p>{{ $servicesOrder->phone }}</p>
            <p>{{ $servicesOrder->email }}</p>
        </div>
    </div>
    <div class="contacts-custom-interes">
        <p>@lang('admin.interes-service') :</p>
        <p>{{$servicesOrder->interes}}</p>
    </div>
    <form id="services-form" class="services-order-form" action="{{ route('servicesOrder.update', $servicesOrder->id)  }}" method="POST">
        @csrf
        @method('PUT')


        <div class="service-radio-wrap">
            <select name="status">

                @if($servicesOrder->status == 0)

                    <option selected value="0">@lang('admin.order-new')</option>
                    <option value="1">@lang('admin.order-in-processing')</option>
                    <option value="2">@lang('admin.order-processed')</option>
                    <option value="3">@lang('admin.order-annulled')</option>

                @elseif ($servicesOrder->status == 1)

                    <option value="0">@lang('admin.order-new')</option>
                    <option selected value="1">@lang('admin.order-in-processing')</option>
                    <option value="2">@lang('admin.order-processed')</option>
                    <option value="3">@lang('admin.order-annulled')</option>

                @elseif ($servicesOrder->status == 2)

                    <option value="0">@lang('admin.order-new')</option>
                    <option value="1">@lang('admin.order-in-processing')</option>
                    <option selected value="2">@lang('admin.order-processed')</option>
                    <option value="3">@lang('admin.order-annulled')</option>

                @elseif ($servicesOrder->status == 3)

                    <option value="0">@lang('admin.order-new')</option>
                    <option value="1">@lang('admin.order-in-processing')</option>
                    <option value="2">@lang('admin.order-processed')</option>
                    <option selected value="3">@lang('admin.order-annulled')</option>

                @endif

            </select>


        </div>

        <button for="services-form" type="submit">@lang('admin.change')</button>
        <a class="close-order-btn" href="{{ route('servicesOrder.index') }}">@lang('admin.close')</a>


    </form>
</div>

@endsection
