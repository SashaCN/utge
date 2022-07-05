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
    <form action=""class="news-category-line flex-aic">
        @foreach ($categories as $category)
        @php
            $title = $category->localization[0];
        @endphp
        <p>{{$title->$locale}}</p>
            <p><input type="radio" name="category" id="all-news" checked><label for="all-news">@lang('utge.all_categories')</label></p>
        @endforeach
    </form>

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
