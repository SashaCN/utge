@extends('site.index')

@section('seo')

@php
    $locale = app()->getLocale();

    $title_seo = $product->localization[2];
    $desc_seo = $product->localization[3];
    $key_seo = $product->localization[4];
    $og_title_seo = $product->localization[5];
    $og_desc_seo = $product->localization[6];
    // $custom_seo = $product->localization[7];

@endphp

<meta property="og:image" content="{{ $product->getFirstMediaUrl('images') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url()}}">
<meta property="og:title" content="{{ $og_title_seo->$locale }}">
<meta property="og:description" content="{{ $og_desc_seo->$locale }}">
<meta name="description" content="{{ $desc_seo->$locale }}">
<meta name="keywords" content="{{ $key_seo->$locale }}">
{{-- <meta property="" content="{{ $custom_seo->$locale }}"> --}}
<title>{{ $title_seo->$locale }}</title>

@endsection

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
    $title = $product->localization[0];
    $description = $product->localization[1];

    if ($product->sizeprices->whereIn('available', [1,4])->min('price')) {
        $min_price = $product->sizeprices->whereIn('available', [1,4])->min('price');
    } else {
        $min_price = $product->sizeprices->min('price');
    }


    if ($product->sizeprices->where('price', $min_price)->first()->available == 1) {
        $available = 'available';
    } elseif ($product->sizeprices->where('price', $min_price)->first()->available == 2) {
        $available = 'not_available';
    } elseif ($product->sizeprices->where('price', $min_price)->first()->available == 3) {
        $available = 'waiting_available';
    } else {
        $available = 'available_for_order';
    }
@endphp

<div class="wrapper">
    <figure class="current-product flex-sb {{ $available }}" data-product-number="{{ $product->id }}">
        <div class="img-half">
            <p class="status">@lang('admin.'.$available)</p>
            <div class="img-wrap">
                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
            </div>
        </div> 
        <section class="desc-half">
            <h2>{{ $title->$locale }}</h2>
            <div class="desc-wrap">
                <p class="desc">
                    {!! $description->$locale !!}
                </p>

            </div>
        </section>
    </figure>
</div>

@endsection

