@extends('site.index')

@php
$locale = app()->getLocale();
@endphp

@section('content')

@php
$locale = app()->getLocale();
$productsId = explode(',', trim($_GET['products'], '[]'));
@endphp
<div class="wrapper favourite">
    <div class="product-list flex-sb">

    @if (empty($productsId))
    <div class="basket-products">
        <p class="basket-clear">&nbsp;</p>
    </div>
    @else
    @foreach ($productsId as $id)
    @foreach ($products as $product)
    @if ($product->id == trim($id, '"'))
    @php
    $title = $product->localization[0];
    $description = $product->localization[1];
    @endphp
    <a href="{{ route('product', $product->id, $product->localization[0]) }}">
        @php
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
        <figure class="product product_id shadow-box flex-col {{ $available }}" data-product-id="{{ $product->id }}">
            <p class="status">@lang('admin.'.$available)</p>
            <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
            <figcaption>
                <h3>{{ $title->$locale }}</h3>
                <p class="description">{!! $description->$locale !!}</p>
                <p class="description active-size">{{ $product->sizeprices->where('price', $min_price)->first()->size }}</p>
                <div class="button-line flex-sb">

                        <p class="add-to-basket flex-aic">


                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                                </svg>
                                <span>
                                    @lang('utge.add-to-basket')
                                </span>

                        </p>
                    <p class="price">{{ $min_price }}&nbsp;{{ $product->sizeprices->where('price', $min_price)->first()->price_units }}</p>
                    <span class="like">
                        <svg>
                            <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                        </svg>
                    </span>
                </div>
            </figcaption>
        </figure>
    </a>
    @endif
    @endforeach
    @endforeach
    @endif
</div>
</div>


{{-- <script src="{{ asset('js/basket.js') }}"></script> --}}


@endsection
