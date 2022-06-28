@php
    $locale = app()->getLocale();

    $title_seo = $product->localization[2];
    $desc_seo = $product->localization[3];
    $key_seo = $product->localization[4];
    $og_title_seo = $product->localization[5];
    $og_desc_seo = $product->localization[6];
    // $custom_seo = $product->localization[7];

@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:image" content="{{ $product->getFirstMediaUrl('images') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:title" content="{{ $og_title_seo->$locale }}">
    <meta property="og:description" content="{{ $og_desc_seo->$locale }}">
    <meta name="description" content="{{ $desc_seo->$locale }}">
    <meta name="keywords" content="{{ $key_seo->$locale }}">
    {{-- <meta property="" content="{{ $custom_seo->$locale }}"> --}}
    <title>{{ $title_seo->$locale }}</title>
</head>
<body>

</body>
</html>
