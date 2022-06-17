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

    @foreach ($contacts as $item)
        @php
            $title = $item->localization[0];
            $description = $item->localization[1];
        @endphp

        <div>
            <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
            <h3>{{ $title->$locale }}</h2>
            <p>{!! $description->$locale !!}</p>
        </div>

    @endforeach

@endsection
