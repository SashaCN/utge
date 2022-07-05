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

<div class="wrapper">
    <ul class="news-category-line flex-aic">
        <li><a href="#" class="active">@lang('utge.all_categories')</a></li>
        <li><a href="#">осетрові</a></li>
        <li><a href="#">комбікорм</a></li>
        <li><a href="#">послуги</a></li>
        <li><a href="#">інші товари</a></li>
    </ul>

    <div class="news-list">
        @foreach ($news as $item)
            @php
                $title = $item->localization[0];
                $description = $item->localization[1];
            @endphp

            <article class="new shadow-box">
                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <div class="new-desc">
                    <h3>{{ $title->$locale }}</h3>
                    <div class="desc">{!! $description->$locale !!}<a href="#">@lang('utge.full_new')</a></div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="pagination">
        <p class="page-link-previous"></p>
        <div class="flex-sb slider-nav">

        </div>
        <p class="page-link-next disabled"></p>
    </div>
</div>


@endsection
