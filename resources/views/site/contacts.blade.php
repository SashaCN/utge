@extends('site.index')

@section('content')
    @php
        $locale = app()->getLocale();
    @endphp

<div class="wrapper">
    <div class="own-section">
        @foreach ($contacts as $item)
            @php
                $title = $item->localization[0];
                $description = $item->localization[1];
            @endphp
    
            <div class="own-blocks">
                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <h3>{{ $title->$locale }}</h2>
                <p>{!! $description->$locale !!}</p>
            </div>
        @endforeach
    </div>

    <div class="feedback-section">
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
                </div>
            </div>
            <div>
                <label for="interes">@lang('utge.interes-service')<span>*</span></label>
                <textarea name="interes" id="interes"></textarea>
            </div>
            <i><span>*</span>@lang('utge.i')</i>
            <button for="service-form" type="submit">надіслати</button>
        </form>
    </div>

    <div class="map-section">
        <h3>ми на карті</h4>
    </div>
</div>

@endsection
