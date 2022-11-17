@extends('admin.admin')

@section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.modules')</h2>
        <a href="{{ route('childPage.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <h3 class="models-h3">@lang('admin.slider')</h3>
    <div class="sliders-box">
        @php
            $i = 1
        @endphp
        @foreach ($sliders as $sliderKey => $sliderValue)
            <div class="slider"><a href="{{ route('childPage.sliderEdit', ['slider_id' => $sliderKey, 'sliderCount' => $i]) }}">Слайдер {{ $i }}</a></div>
            @php
                $i++
            @endphp
        @endforeach
    </div>

    <h3 class="models-h3">header</h3>
    <div class="header-modulus">
        <div>
            <p class="models-p">@lang('admin.phone')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'phone')
                            @php
                                    $phone = $childPage->localization[0];
                            @endphp

                            <tr>
                                <td>{{ $phone->$locale }}</td>

                                <td class="action">
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p class="models-p">@lang('admin.logo-img')</p>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'logo-img')

                        <tr>
                            <td><img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="logo"></td>
                            <td class="action">
                                <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>

                                <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        </div>
        <div>
            <p class="models-p">@lang('admin.logo-name')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'logo-name')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp

                            <tr>
                                <td>{{ $title->$locale }}</td>

                                <td class="action">
                                    <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>

                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="models-h3">footer</h3>
    <div class="footer-modulus">
        <div>
            <p class="models-p">@lang('admin.phone')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'phone')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp

                            <tr>
                                <td>{{ $title->$locale }}</td>

                                <td class="action">
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p class="models-p">@lang('admin.footer-place')</p>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'footer-place')
                        @php
                                $title = $childPage->localization[0];
                        @endphp

                        <tr>
                            <td>{{ $title->$locale }}</td>

                            <td class="action">
                                <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
                                <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        </div>
        <div>
            <p class="models-p">@lang('admin.email')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'email')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp

                            <tr>
                                <td>{{ $title->$locale }}</td>

                                <td class="action">
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="page-models">
        <h3 class="models-p">@lang('utge.about-us')</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.route')</th>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'about_us')
                        @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email' &&  $childPage->route != 'slider1' &&  $childPage->route != 'slider2' &&  $childPage->route != 'slider3' &&  $childPage->route != 'slider4')
                            @php
                                $title = $childPage->localization[0];
                                $description = $childPage->localization[1];
                            @endphp
    
                            <tr>
                                <td>
                                    @if ($childPage->route == 'delivery')
                                        <p>@lang('utge.delivery')</p>
                                    @endif
    
                                    @if ($childPage->route == 'payment')
                                        <p>@lang('utge.payment')</p>
                                    @endif
    
                                    @if ($childPage->route == 'contacts')
                                        <p>@lang('utge.contacts')</p>
                                    @endif
    
                                    @if ($childPage->route == 'about_us')
                                        <p>@lang('utge.about-us')</p>
                                    @endif
                                </td>
    
                                <td>{{ $title->$locale }}</td>
    
                                <td class="action">
                                    <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
    
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif  
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="page-models">
        <h3 class="models-p">@lang('utge.delivery')</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.image')</th>
                    <th>@lang('admin.route')</th>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'delivery')
                        @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email' &&  $childPage->route != 'slider1' &&  $childPage->route != 'slider2' &&  $childPage->route != 'slider3' &&  $childPage->route != 'slider4')
                            @php
                                $title = $childPage->localization[0];
                                $description = $childPage->localization[1];
                            @endphp
    
                            <tr>
                                <td class="product-image">
                                    @if ($childPage->route != 'about_us')
                                        <img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                                    @endif
                                </td>
    
                                <td>
                                    @if ($childPage->route == 'delivery')
                                        <p>@lang('utge.delivery')</p>
                                    @endif
    
                                    @if ($childPage->route == 'payment')
                                        <p>@lang('utge.payment')</p>
                                    @endif
    
                                    @if ($childPage->route == 'contacts')
                                        <p>@lang('utge.contacts')</p>
                                    @endif
    
                                    @if ($childPage->route == 'about_us')
                                        <p>@lang('utge.about-us')</p>
                                    @endif
                                </td>
    
                                <td>{{ $title->$locale }}</td>
    
                                <td class="action">
                                    @if ($childPage->route != 'about_us')
                                        <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
                                    @endif
    
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif  
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="page-models">
        <h3 class="models-p">@lang('utge.payment')</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.image')</th>
                    <th>@lang('admin.route')</th>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'payment')
                        @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email' &&  $childPage->route != 'slider1' &&  $childPage->route != 'slider2' &&  $childPage->route != 'slider3' &&  $childPage->route != 'slider4')
                            @php
                                $title = $childPage->localization[0];
                                $description = $childPage->localization[1];
                            @endphp
    
                            <tr>
                                <td class="product-image">
                                    @if ($childPage->route != 'about_us')
                                        <img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                                    @endif
                                </td>
    
                                <td>
                                    @if ($childPage->route == 'delivery')
                                        <p>@lang('utge.delivery')</p>
                                    @endif
    
                                    @if ($childPage->route == 'payment')
                                        <p>@lang('utge.payment')</p>
                                    @endif
    
                                    @if ($childPage->route == 'contacts')
                                        <p>@lang('utge.contacts')</p>
                                    @endif
    
                                    @if ($childPage->route == 'about_us')
                                        <p>@lang('utge.about-us')</p>
                                    @endif
                                </td>
    
                                <td>{{ $title->$locale }}</td>
    
                                <td class="action">
                                    @if ($childPage->route != 'about_us')
                                        <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
                                    @endif
    
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif  
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="page-models">
        <h3 class="models-p">@lang('utge.contacts')</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.image')</th>
                    <th>@lang('admin.route')</th>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'contacts')
                        @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email' &&  $childPage->route != 'slider1' &&  $childPage->route != 'slider2' &&  $childPage->route != 'slider3' &&  $childPage->route != 'slider4')
                            @php
                                $title = $childPage->localization[0];
                                $description = $childPage->localization[1];
                            @endphp
    
                            <tr>
                                <td class="product-image">
                                    @if ($childPage->route != 'about_us')
                                        <img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                                    @endif
                                </td>
    
                                <td>
                                    @if ($childPage->route == 'delivery')
                                        <p>@lang('utge.delivery')</p>
                                    @endif
    
                                    @if ($childPage->route == 'payment')
                                        <p>@lang('utge.payment')</p>
                                    @endif
    
                                    @if ($childPage->route == 'contacts')
                                        <p>@lang('utge.contacts')</p>
                                    @endif
    
                                    @if ($childPage->route == 'about_us')
                                        <p>@lang('utge.about-us')</p>
                                    @endif
                                </td>
    
                                <td>{{ $title->$locale }}</td>
    
                                <td class="action">
                                    @if ($childPage->route != 'about_us')
                                        <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
                                    @endif
    
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif  
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="page-models">
        <h3 class="models-p">@lang('admin.privacy_policy')</h3>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'privacy_policy')
                        @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email' &&  $childPage->route != 'slider1' &&  $childPage->route != 'slider2' &&  $childPage->route != 'slider3' &&  $childPage->route != 'slider4')
                            @php
                                $title = $childPage->localization[0];
                                $description = $childPage->localization[1];
                            @endphp
    
                            <tr>    
                                <td style="text-align:center;">{{ $title->$locale }}</td>
    
                                <td class="action">
                                    <a title="Редагувати" href="{{ route('childPage.edit', $childPage->id) }}"></a>
                                    <a title="Видалити" href="{{ route('childPage.delete', $childPage->id) }}"></a>
                                </td>
                            </tr>
                        @endif  
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
