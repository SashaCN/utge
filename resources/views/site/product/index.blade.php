@extends('site.index')

@section('content')

@php
    $locale = app()->getLocale();
@endphp


<div class="wrapper flex-sb">
  <div class="filter-box">

  </div>
  <div class="product-list flex-sb shadow-box">
    @foreach ($products as $product)
        @php
            $title = $product->localization[0];
            $description = $product->localization[1];

            foreach ($product->sizeprices as $sizeprice) {
                
            }
        @endphp
      <a href="#">
        <figure class="product shadow-box">
          <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
          <figcaption>
            <h3>{{ $title->$locale }}</h3>
            <p class="description">{{ $description->$locale }}</p>
            <div class="button-line flex-sb">
              <p class="add-to-basket flex-aic">
                <svg>
                  <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                </svg>
                <span>
                  @lang('utge.add-to-basket')
                </span>
              </p>
              <p class="price">{{ $product->price }}</p>
            </div>
          </figcaption>
        </figure>
      </a>
    @endforeach
  </div>
</div>

@endsection
