@extends('site.index')

@section('content')

<?php

  if (app()->getLocale() == 'uk') {
      $title = 'title_uk';
      $description = 'description_uk';
  } elseif (app()->getLocale() == 'ru') {
      $title = 'title_ru';
      $description = 'description_ru';
  }

?>

<div class="wrapper flex-sb">
  <div class="filter-box">

  </div>
  <div class="product-list flex-sb shadow-box">
    @foreach ($products as $product)
      <a href="#">
        <figure class="product shadow-box">
          <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->localization[0]->$title }}">
          <figcaption>
            <h3>{{ $product->localization[0]->$title }}</h3>
            <p class="description">{{ $product->localization[0]->$description }}ууа ргы рващр щйшуащшц уащшц цущшащшц</p>
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