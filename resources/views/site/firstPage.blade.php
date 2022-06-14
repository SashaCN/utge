@extends('site.index')

@section('content')

<div class="wrapper">
    <div class="grid">
        <section class="feed">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-feed')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#cow') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-feed-birds')</h2><img src="{{ asset('img/sl_birds.jpg') }}"
                        alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-feed-fish')</h2><img src="{{ asset('img/sl_fish.jpg') }}"
                        alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-feed-animals')</h2><img src="{{ asset('img/sl_animals.jpg') }}"
                        alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="fish">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-staves')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#fish') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-caviar')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-fish')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-staves-canned')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="water">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-product')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#goods') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-electric')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-plumbing')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-product-heating')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <section class="service">
            <div class="slider-line">
                <div class="slide slide-preview current-slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <svg>
                        <use xlink:href="{{ asset('img/sprite.svg#man') }}"></use>
                    </svg>
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_birds.jpg') }}" alt="@lang('utge.sl_birds')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_fish.jpg') }}" alt="@lang('utge.sl_fish')">
                </div>
                <div class="slide">
                    <h2>@lang('utge.slider-service')</h2>
                    <img src="{{ asset('img/sl_animals.jpg') }}" alt="@lang('utge.sl_animals')">
                </div>
            </div>
            <div class="slider-control"><span class="current-slide-btn"></span><span></span><span></span><span></span>
            </div>
        </section>
        <script src="{{ asset('js/slider.js') }}"></script>
    </div>
</div>
<div class="about-us">
    <h2 class="mb30">@lang('utge.about-us')</h2>
    <div class="wrapper">
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
            <p>Nesciunt magnam alias perferendis sed consequuntur ad perspiciatis, soluta numquam praesentium est libero
                explicabo eligendi! Dicta mollitia perferendis nobis aut repudiandae fuga est libero pariatur, obcaecati
                alias neque possimus repellat non recusandae minus natus officia id dolore vel eum ipsum. Quis cum eum
                odit perferendis. Voluptatibus quisquam ullam fuga, voluptas dignissimos, veritatis maxime dolorum,
                fugiat magni laborum sint deserunt nobis nisi nemo laudantium enim. Repellendus placeat officiis iste
                sequi labore, tempora quae explicabo praesentium porro velit alias quasi eos nemo.</p>
        </div>
    </div>
</div>
<div class="best-goods">
    <h2 class="mb30">@lang('utge.best-produts')</h2>
    <div class="wrapper">
        <div class="goods-list flex-sb">
            @php
            $locale = app()->getLocale();
            @endphp

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
                        <p class="description">{!! $description->$locale !!}</p>
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
                            <span class="like">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                                </svg>
                            </span>
                        </div>
                    </figcaption>
                </figure>
                @else
                <figure class="product shadow-box out-of-store">
                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                    <figcaption>
                        <h3>{{ $title->$locale }}</h3>
                        <p class="description">{!! $description->$locale !!}</p>
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
                            <span class="like">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprite.svg#like') }}"></use>
                                </svg>
                            </span>
                        </div>
                    </figcaption>
                </figure>
                @endif
            </a>
            @endforeach
        </div>
        <div class="pagination">
            {{ $products->withQueryString()->links('vendor.pagination.utge-pagination') }}
        </div>
    </div>
</div>


@endsection
