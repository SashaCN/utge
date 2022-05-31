@extends('site.index')

@section('content')

<div class="wrapper">
    <div class="grid">
        <section class="feed">
            <h2>@lang('utge.slider-feed')</h2>
            <div class="slider-line">
              <div class="slide slide-preview">
                <svg>
                  <use xlink:href="{{ asset('img/sprite.svg#cow') }}"></use>
                </svg>
              </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="fish">
            <h2>@lang('utge.slider-fish')</h2>
            <div class="slider-line">
              <div class="slide slide-preview">
                <svg>
                  <use xlink:href="{{ asset('img/sprite.svg#fish') }}"></use>
                </svg>
              </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="water">
            <h2>@lang('utge.slider-product')</h2>
            <div class="slider-line">
              <div class="slide slide-preview">
                <svg>
                  <use xlink:href="{{ asset('img/sprite.svg#goods') }}"></use>
                </svg>
              </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
        <section class="service">
            <h2>@lang('utge.slider-service')</h2>
            <div class="slider-line">
              <div class="slide slide-preview">
                <svg>
                  <use xlink:href="{{ asset('img/sprite.svg#man') }}"></use>
                </svg>
              </div>
            </div>
            <div class="slider-control"><span class="current-slide"></span><span></span><span></span><span></span></div>
        </section>
    </div>
</div>

@endsection
