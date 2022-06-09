@extends('admin.admin')
@section('content')

    <?php

    $locale = app()->getLocale();

    ?>

    @if ($errors->any())
        <ul>
            {{-- {{dd($errors->default)}} --}}
            @foreach ($errors->all() as $error)
                @if (strripos($error, '.') == true)
                    <li>
                        @switch(explode('.', $error)[0])
                            @case('size')
                                @lang('admin.error-size')
                                @break

                            @case('price')
                                @lang('admin.error-price')
                                @break

                            @case('price units')
                                @lang('admin.error-price_units')
                                @break
                                
                            @case('available')
                                @lang('admin.error-available')
                                @break
                                
                            @default
                                
                        @endswitch
                        
                        <?= ' '.explode('.', $error)[1];?>
                    </li> 
                @else
                    <li>{{ $error }}</li>
                @endif
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.product_create')</h2>
        <button type="submit" form="form" class="add-button">
            <img src="{{ asset('img/save.svg') }}" alt="Add">
        </button>
    </div>

    <ul class="create-list flex">
        <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
        <li><a href="#" class="desc-btn">@lang('admin.description')</a></li>
        <li><a href="#" class="sp-btn">@lang('admin.sizeprice')</a></li>
        <li><a href="#" class="photo-btn">@lang('admin.photo')</a></li>
        <li><a href="#" class="another-btn">@lang('admin.another')</a></li>
    </ul>

    <form id="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">
        @csrf

        <div class="name-slide flex-col current-slide">
            <div class="input-wrap">
                <input type="text" id="title_uk" name="title_uk">
                <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
            </div>
            <div class="input-wrap">
                <input type="text" id="title_ru" name="title_ru">
                <label class="label" for="title_ru">@lang('admin.add_ru_title')</label>
            </div>
        </div>
        <div class="desc-slide flex-col">
            <div class="input-wrap">
                <textarea name="description_uk" id="desc_uk" cols="30" rows="10"></textarea>
                <label class="label" for="desc_uk">@lang('admin.add_uk_desc')</label>
            </div>
            <div class="input-wrap">
                <textarea name="description_ru" id="desc_ru" cols="30" rows="10"></textarea>
                <label class="label" for="desc_ru">@lang('admin.add_ru_desc')</label>
            </div>
        </div>
        <div class="size-price-slide flex-col">
            <div class="size-price">
                <div class="input-wrap">
                    <input type="text" name="size1" id="size1" class="auto-value">
                    <label class="label" for="size1">@lang('admin.add_size')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" name="price1" id="price1" class="auto-value">
                    <label class="label" for="price1">@lang('admin.add_price')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" name="price_units1" id="price_units1" class="auto-value">
                    <label class="label" for="price_units1">@lang('admin.add_price_units')</label>
                </div>

                <div class="input-wrap pt0">
                    <p>@lang('admin.add_available')</p>
                    <select name="available1" class="auto-value">
                        <option value="1">@lang('admin.available')</option>
                        <option value="2">@lang('admin.not_available')</option>
                        <option value="3">@lang('admin.waiting_available')</option>
                        <option value="4">@lang('admin.available_for_order')</option>
                    </select>
                </div>

                <input type="hidden" name="sizecount" value="1">
                <hr>
            </div>
            <button id="add-size-price" class="image-changes-bt">@lang('admin.add_size_price')</button>
            <button id="delete-size-price" class="image-changes-bt">@lang('admin.delete_size_price')</button>
        </div>
        <div class="image-slide flex-col">
            <label><input type="hidden" name="image" value=""></label>
            <label><input type="file" name="image"></label>
        </div>
        <div class="another-slide flex-col">
            <div class="input-wrap sub-category-wrap">
                <p class="label">Виберіть під-категорію</p>
                <div class="flex-space sub-category-wrap">
                    <label><input type="hidden" name="sub_category_id"></label>

                    @foreach ($subcategories as $subcategory)
                        @php
                            $title = $subcategory->localization[0];
                        @endphp

                        <input class="radio-change" type="radio" id="{{ $subcategory->id }}" name="sub_category_id" value="{{ $subcategory->id }}">
                        <label class="radio-label" for="{{ $subcategory->id }}"><span class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                    @endforeach
                </div>
            </div>
            <div class="input-wrap">
                <p>@lang('admin.add_home_view')</p>
                <select name="home_view">
                    <option value="0" selected>@lang('admin.not_home_view')</option>
                    <option value="1">@lang('admin.home_view')</option>
                </select>
            </div>
            <div class="input-wrap">
                <input type="number" name="list_position" value="0" id="list_pos">
                <label for="list_pos" class="label">@lang('admin.add_list_position')</label>
            </div>
            {{-- <input type="submit" value="Send" class="save"> --}}
        </div>

        <script>
            function getStructure(counter) {
                return structure = `
                    <div class="input-wrap">
                        <input type="number" name="size.${counter}" id="size${counter}" class="auto-value">
                        <label class="label" for="size${counter}">@lang('admin.add_size')</label>
                    </div>

                    <div class="input-wrap">
                        <input type="number" name="price.${counter}" id="price${counter}" class="auto-value">
                        <label class="label" for="price${counter}">@lang('admin.add_price')</label>
                    </div>

                    <div class="input-wrap">
                        <input type="text" name="price_units.${counter}" id="price_units${counter}" class="auto-value">
                        <label class="label" for="price_units${counter}">@lang('admin.add_price_units')</label>
                    </div>

                    <div class="input-wrap pt0">
                        <p>@lang('admin.add_available')</p>
                        <select name="available.${counter}" class="auto-value">
                            <option value="1">@lang('admin.available')</option>
                            <option value="2">@lang('admin.not_available')</option>
                            <option value="3">@lang('admin.waiting_available')</option>
                            <option value="4">@lang('admin.available_for_order')</option>
                        </select>
                    </div>
                    <input type="hidden" name="sizecount" value="${counter}">
                    <hr>
                `;
            }

        </script>
        <script src="{{ asset('js/sizeprice.js') }}"></script>
    </form>
    <script src="{{ asset('js/create.js') }}"></script>
@endsection
