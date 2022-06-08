@extends('site.index')

@section('content')

@php
    $locale = app()->getLocale();
@endphp


<div class="wrapper flex-sb">
  <div class="filter-box">

  </div>
  <div class="product-list flex-sb">
    @foreach ($products as $product)
        @php
            $title = $product->localization[0];
            $description = $product->localization[1];
        @endphp
      <a href="#">
        @if ($product->sizeprices->whereIn('available', [1,4])->min('price'))
            <figure class="product shadow-box">
                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <figcaption>
                    <h3>{{ $title->$locale }}</h3>
                    <p class="description">{{ $description->$locale }}</p>
                    <p class="description">{{ $product->sizeprices->whereIn('available', [1,4])->min('size') }}</p>
                    <div class="button-line flex-sb">
                        <p class="add-to-basket flex-aic">
                            <svg>
                                <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                            </svg>
                            <span>
                                @lang('utge.add-to-basket')
                            </span>
                        </p>
                        <p class="price">{{ $product->sizeprices->whereIn('available', [1,4])->min('price') }}</p>
                    </div>
                </figcaption>
            </figure>
        @else
            <figure class="product shadow-box out-of-store">
                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <figcaption>
                    <h3>{{ $title->$locale }}</h3>
                    <p class="description">{{ $description->$locale }}</p>
                    <p class="description">{{ $product->sizeprices->min('size') }}</p>
                    <div class="button-line flex-sb">
                        <p class="add-to-basket flex-aic">
                            <svg>
                                <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                            </svg>
                            <span>
                                @lang('utge.add-to-basket')
                            </span>
                        </p>
                        <p class="price">{{ $product->sizeprices->min('price') }}</p>
                    </div>
                </figcaption>
            </figure>
        @endif
      </a>
    @endforeach
  </div>
</div>

@endsection
