@extends('site.index')

@section('phone-list')
    @php
        $locale = app()->getLocale();
    @endphp

    <ul class="phone-list">
        @foreach ($phones as $item)
            @php
                $phone = $item->localization[0];
                $phoneHref = preg_replace( "/[^0-9]/" , '' , $phone->$locale );
            @endphp
        <li><a href="tel:+{{ $phoneHref }}">{{ $phone->$locale }}</a></li>
        @endforeach
    </ul>
@endsection

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <section class="delivery">
        <h2>@lang('utge.delivery')</h2>

        <div class="wrapper delivery-list">
            @foreach ($deliveries as $item)
                @php
                    $title = $item->localization[0];
                    $description = $item->localization[1];
                @endphp

                <figure class="delivery-card shadow-box flex-aic">
                    <div class="img-wrap">
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    </div>
                    <figcaption>
                        <h3>{{ $title->$locale }}</h2>
                        <p>{!! $description->$locale !!}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </section>
    <section class="delivery payment">
        <h2>@lang('utge.payment')</h2>

        <div class="wrapper delivery-list payment-list">
            @foreach ($payments as $item)
                @php
                    $title = $item->localization[0];
                    $description = $item->localization[1];
                @endphp

                <figure class="delivery-card shadow-box flex-aic">
                    <div class="img-wrap">
                        <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    </div>
                    <figcaption>
                        <h3>{{ $title->$locale }}</h2>
                        <p>{!! $description->$locale !!}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </section>

@endsection
