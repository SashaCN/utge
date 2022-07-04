@extends('site.index')

@section('content')

@php
$locale = app()->getLocale();
@endphp

    @foreach ($news as $item)
        @php
            $title = $item->localization[0];
            $description = $item->localization[1];
        @endphp
        
        <div>
            <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
            <p>{{ $title->$locale }}</p>
            <p>{{ $description->$locale}}</p>
        </div>
    @endforeach

@endsection