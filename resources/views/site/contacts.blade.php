@extends('site.index')

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
