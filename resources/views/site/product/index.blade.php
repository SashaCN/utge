@extends('site.index')

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
@endphp


<div class="wrapper flex-sb product-page">
    <div class="filter-menu">
        <form id="filter" action="{{ route('products') }}">
            @foreach ($producttypes as $type)
            @php
            $title = $type->localization[0];
            @endphp
            <div class="filter-box">
                <h4>{{ $title->$locale }}</h4>
                <ul class="filter-list">
                    @foreach ($categories->where('product_type_id', $type->id) as $category)
                    @php
                    $title = $category->localization[0];
                    @endphp
                    <li class="category-li">
                        <p class="category-item">
                            {{ $title->$locale }}
                        </p>
                        <ul class="sub-list hidden">
                            @foreach ($category->subcategories as $sub)
                            @php
                            $title = $sub->localization[0];
                            @endphp
                            <li>
                                <input type="checkbox" name="subcategoryid_{{$sub->id}}" id="sub{{$sub->id}}" value="{{$sub->id}}" @if ((isset($_GET['subcategoryid_'.$sub->id])) && ($_GET['subcategoryid_'.$sub->id] == $sub->id)) checked @endif>
                                <label for="sub{{$sub->id}}">
                                    <p class="sub-item">{{ $title->$locale }}</p>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </form>
        <script src="{{ asset('js/filter.js') }}"></script>
    </div>
    <div class="product-list flex-sb">
        @foreach ($products as $product)
        @php
        $title = $product->localization[0];
        $description = $product->localization[1];
        @endphp
        <a href="{{ route('product', $product->id) }}">
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
            <figure class="product shadow-box flex-col {{ $available }}">
                <p class="status">@lang('admin.'.$available)</p>
                <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                <figcaption>
                    <h3>{{ $title->$locale }}</h3>
                    <p class="description">{!! $description->$locale !!}</p>
                    <p class="description">{{ $product->sizeprices->where('price', $min_price)->first()->size }}</p>
                    <div class="button-line flex-sb">
                        <p class="add-to-basket flex-aic">
                            <svg>
                                <use xlink:href="{{ asset('img/sprite.svg#basket') }}"></use>
                            </svg>
                            <span>
                                @lang('utge.add-to-basket')
                            </span>
                        </p>
                        <p class="price">{{ $min_price }}</p>
                        <span class="like">
                            <svg>
                                <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                            </svg>
                        </span>
                    </div>
                </figcaption>
            </figure>
        </a>
        @endforeach
        <div class="pagination">
            {{ $products->withQueryString()->links('vendor.pagination.utge-pagination') }}
        </div>
        <div class="text-wrap shadow-box">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus est eaque dolore fugit nobis minima
                excepturi ut, dolor nemo odit nam, harum libero minus earum vel? Tempore possimus iusto accusantium! Cum
                ipsa ad veniam, excepturi ab expedita tenetur? Doloribus quos expedita harum eveniet ex quasi at
                praesentium et libero atque facilis esse, quisquam tempora provident placeat voluptates iusto veritatis
                eaque! Consectetur, repudiandae. Dolor molestiae numquam quod ipsam alias, corporis nihil et ipsa ea
                mollitia repellat voluptas assumenda veniam molestias modi!</p>
            <p>Magnam, sequi aliquid? Neque ullam iste odit culpa reiciendis saepe mollitia nostrum asperiores esse
                vitae explicabo eveniet error rem dolorem, animi dolores delectus aliquid non. Labore, quas at sint
                laborum cum ab qui exercitationem neque in assumenda voluptatibus cupiditate possimus laudantium
                provident ullam quaerat. Provident repellat officia libero neque velit impedit aspernatur beatae
                repellendus nemo. Dolores, dicta itaque qui cupiditate dolore eveniet quibusdam deleniti porro facilis
                incidunt vero eius ipsa minima reiciendis laudantium nam quas ratione aut exercitationem molestiae
                aperiam.</p>
        </div>
    </div>
</div>

@endsection
