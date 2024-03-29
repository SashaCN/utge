@extends('site.index')

<?php
    $locale = app()->getLocale();
?>
@section('content')

<div class="services-show">

    @foreach ($types as $type)
        @php
            $title_type = $type->localization[0];
            $desc_type = $type->localization[1];
        @endphp
        <h3>{{ $title_type->$locale }}</h3>
        <div class="wrapper services-desc">{!! $desc_type->$locale !!}</div>
    @endforeach
    <div class="wrapper service-table-box">
        <table class="service-table">
            <tr class="service-units">
                <td>@lang('utge.type-work')</td>
                <td>@lang('utge.material')</td>
                <td>@lang('utge.units')</td>
                <td>@lang('utge.price-units')</td>
            </tr>
            @foreach ($categories as $category)
                @php
                    $title_category = $category->localization[0];
                @endphp
                <tr class="service-category">
                    <td colspan="4">{{ $title_category->$locale }}</td>
                </tr>
                    @foreach ($services as $service)
                        @php
                            $counter = 0;
                            if(isset($service->localization[0])){
                                $title_service = $service->localization[0];
                            } 
                            if(isset($service->localization[1])){
                                $materials = $service->localization[1];
                            } 

                        @endphp
                        @if ($service->service_category_id == $category->id)

                            @foreach ($service->servicessizeprice as $item)
                            @endforeach
                            
                            @if (empty($materials->$locale) && isset($item->units))
                                <tr class="service-item">
                                    <td>@if (isset($title_service->$locale)) {{ $title_service->$locale }} @else opps we lost it @endif</td>
                                    <td></td>
                                    <td>{{ $item->units}}</td>
                                    <td>

                                        @if ($item->price_ru != null && $locale != 'uk')
                                            {{ $item->price_ru }}
                                            
                                        @else
                                            {{ $item->price }}
                                        @endif
                                    </td>
                                </tr>
                            @else
                                <tr class="service-item">
                                    <td>{{ $title_service->$locale }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                {{-- @dd($service->servicessizeprice) --}}
                                @foreach ($service->servicessizeprice as $sizePrize)
                                @php
                                    $counter++;

                                    if (isset($service->localization[$counter])) {
                                        $materials = $service->localization[$counter];
                                    }
                                    

                                    if ($locale == 'uk') {
                                        $price = $sizePrize->price;
                                    } else {
                                        if ($sizePrize->price_ru != null) {
                                            $price = $sizePrize->price_ru;
                                        } else {
                                            $price = $sizePrize->price;
                                        }
                                    }
                                @endphp
                                <tr class="service-item">
                                    <td></td>
                                    <td class="service-item-materials">@if (isset($materials->$locale)) {{ $materials->$locale }} @else opps we lost it @endif</td>
                                    <td>{{ $sizePrize->units}}</td>
                                    <td>{{ $price}}</td>
                                </tr>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
            @endforeach
        </table>
    </div>
    <div class="wrapper">
        <div class="service-btn" id="popupBtn">
            <p>@lang('utge.order-service')</p>
        </div>
    </div>
    <div id="popupBox">
        <div id="popupCloseBox"></div>
        <div class="service-popup" id="popup">
            <div class="close-popup-btn">
                <span></span>*
                <span></span>
            </div>
            <p>@lang('utge.order-service')</p>
            <form class="service-form" id="service-form" action="{{ route('storeServiceOrder') }}" method="POST">
                @csrf
                @method('POST')
                <div>
                    <div class="service-form-item">
                        <div>
                            <label for="firstname">@lang('utge.firstname')<span>*</span></label>
                            <input required id="firstname" type="text" name="firstname">
                        </div>
                        <div>
                            <label for="lastname">@lang('utge.lastname')<span>*</span></label>
                            <input required id="lastname" type="text" name="lastname">
                        </div>
                    </div>
                    <div class="service-form-item">
                        <div>
                            <label for="popup-phone">@lang('utge.number-phone')<span>*</span></label>
                            <input required id="popup-phone" type="text" name="phone">
                        </div>
                        <div>
                            <label for="mail">E-Mail</label>
                            <input id="mail" type="email" name="email">
                        </div>
                        <input type="hidden" name="from" value="services">
                    </div>
                </div>
                <div>
                    <label for="interes">@lang('utge.interes-service')<span>*</span></label>
                    <textarea name="interes" id="interes"></textarea>
                </div>
                <i><span>*</span>@lang('utge.i')</i>
                <button for="service-form" type="submit">@lang('utge.iss')</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/site.js') }}"></script>
<script src="{{ asset('js/fixHref.js') }}"></script>
<script src="{{ asset('js/popup.js') }}"></script>

@endsection
