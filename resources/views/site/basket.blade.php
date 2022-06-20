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

<h2>@lang('utge.basket')</h2>

@endsection
