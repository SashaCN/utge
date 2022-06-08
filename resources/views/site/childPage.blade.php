@extends('site.index')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    
    @if ($rout == 'delivery')
        <h2>@lang('utge.delivery')</h2>

        @foreach ($deliveries as $item)
            @php
                $title = $item->localization[0];
                $description = $item->localization[1];
            @endphp

            <div>
                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <h3>{{ $title->$locale }}</h2>
                <p>{{ $description->$locale }}</p>
            </div>

        @endforeach

        <h2>@lang('utge.payment')</h2>

        @foreach ($payments as $item)
            @php
                $title = $item->localization[0];
                $description = $item->localization[1];
            @endphp

            <div>
                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <h3>{{ $title->$locale }}</h2>
                <p>{{ $description->$locale }}</p>
            </div>
        @endforeach
    @endif

    @if ($rout == 'contacts')
        @foreach ($contacts as $item)
            @php
                $title = $item->localization[0];
                $description = $item->localization[1];
            @endphp

            <div>
                <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <h3>{{ $title->$locale }}</h2>
                <p>{{ $description->$locale }}</p>
            </div>

        @endforeach
    @endif

@endsection