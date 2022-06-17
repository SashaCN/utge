@extends('admin.admin')
@section('content')

    <?php

    $locale = app()->getLocale();

    ?>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                @if (strripos($error, '/') == true)
                    <li>
                        @switch(explode('/', $error)[0])
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

                        <?= ' '.explode('/', $error)[1];?>
                    </li>
                @else
                    <li>{{ $error }}</li>
                @endif
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.product_create')</h2>
        <button type="submit" form="form" class="add-button" id="save-btm">
            <img src="{{ asset('img/save.svg') }}" alt="Add">
        </button>
    </div>

    <ul class="create-list flex">
        <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
        <li><a href="#" class="desc-btn">@lang('admin.description')</a></li>
        <li><a href="#" class="sp-btn">@lang('admin.sizeprice')</a></li>
        <li><a href="#" class="photo-btn">@lang('admin.photo')</a></li>
        <li><a href="#" class="another-btn">@lang('admin.another')</a></li>
        <li><a href="#" class="seo-btn">SEO</a></li>
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
              <div class="content">
                <div id="editparent">
                  <div id='editControls1' style='text-align:center; padding:5px;'>
                    <div class='btn-group'>
                      <a class='btn' data-role='bold' href='#' title='Жирний текст'><b>B</b></a>
                      <a class='btn' data-role='italic' href='#' title='Курсив'><em>I</em></a>
                      <a class='btn' data-role='underline' href='#' title='Підкреслений'><u><b>U</b></u></a>
                      <a class='btn' data-role='strikeThrough' href='#' title='Перекреслений текст'><strike>abc</strike></a>
                      <a class='btn' data-role='removeFormat' href='#' title='Прибрати стилі шрифта'><i class="fas fa-remove-format"></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='justifyLeft' href='#' title='Вирівняти по лівому краю'><i class='fas fa-align-left'></i></a>
                      <a class='btn' data-role='justifyCenter' href='#' title='Вирівняти по центру'><i class='fas fa-align-center'></i></a>
                      <a class='btn' data-role='justifyRight' href='#' title='Вирівняти по правому краю'><i class='fas fa-align-right'></i></a>
                      <a class='btn' data-role='justifyFull' href='#' title='Вирівняти по ширині'><i class='fas fa-align-justify'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='insertUnorderedList' href='#' title='Ненумерований список'><i class='fas fa-list-ul'></i></a>
                      <a class='btn' data-role='insertOrderedList' href='#' title='Нумерований список'><i class='fas fa-list-ol'></i></a>
                      <a class='btn' data-role='insertTable' href='#' title='Вставити таблицю'><i class='fas fa-table'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='h1' href='#' title='Заголовок 1-го порядку'>h1</a>
                      <a class='btn' data-role='h2' href='#' title='Заголовок 2-го порядку'>h2</a>
                      <a class='btn' data-role='h3' href='#' title='Заголовок 3-го порядку'>h3</a>
                      <a class='btn' data-role='p' href='#' title='Звичайний текст'>p</a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='createlink' href='#' title='Створити посилання'><i class='fa fa-link'></i></a>
                      <a class='btn' data-role='unlink' href='#' title='Прибрати посилання'><i class='fa fa-unlink'></i></a>
                      <a class='btn' data-role='insertimage' href='#' title='Додати зображення'><i class='fa fa-image'></i></a>
                      <a class='btn' data-role='subscript' href='#' title='Нижній індекс'><i class='fas fa-subscript'></i></a>
                      <a class='btn' data-role='superscript' href='#' title='Верхній індекс'><i class='fas fa-superscript'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' id="converToCode1" data-role='switchEditor' href='#' title='Перейти в редактор коду'>&lt;code&gt;</a>
                    </div>
                  </div>
                  <div id='editor1' style='' contenteditable></div>
                  <textarea id="desc_uk" name="description_uk"></textarea>
                  <label class="label" for="desc_uk">@lang('admin.add_uk_desc')</label>
                </div>
              </div>
            </div>
            <div class="input-wrap">
              <div class="content">
                <div id="editparent">
                  <div id='editControls2' style='text-align:center; padding:5px;'>
                    <div class='btn-group'>
                      <a class='btn' data-role='bold' href='#' title='Жирний текст'><b>B</b></a>
                      <a class='btn' data-role='italic' href='#' title='Курсив'><em>I</em></a>
                      <a class='btn' data-role='underline' href='#' title='Підкреслений'><u><b>U</b></u></a>
                      <a class='btn' data-role='strikeThrough' href='#' title='Перекреслений текст'><strike>abc</strike></a>
                      <a class='btn' data-role='removeFormat' href='#' title='Прибрати стилі шрифта'><i class="fas fa-remove-format"></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='justifyLeft' href='#' title='Вирівняти по лівому краю'><i class='fas fa-align-left'></i></a>
                      <a class='btn' data-role='justifyCenter' href='#' title='Вирівняти по центру'><i class='fas fa-align-center'></i></a>
                      <a class='btn' data-role='justifyRight' href='#' title='Вирівняти по правому краю'><i class='fas fa-align-right'></i></a>
                      <a class='btn' data-role='justifyFull' href='#' title='Вирівняти по ширині'><i class='fas fa-align-justify'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='insertUnorderedList' href='#' title='Ненумерований список'><i class='fas fa-list-ul'></i></a>
                      <a class='btn' data-role='insertOrderedList' href='#' title='Нумерований список'><i class='fas fa-list-ol'></i></a>
                      <a class='btn' data-role='insertTable' href='#' title='Вставити таблицю'><i class='fas fa-table'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='h1' href='#' title='Заголовок 1-го порядку'>h1</a>
                      <a class='btn' data-role='h2' href='#' title='Заголовок 2-го порядку'>h2</a>
                      <a class='btn' data-role='h3' href='#' title='Заголовок 3-го порядку'>h3</a>
                      <a class='btn' data-role='p' href='#' title='Звичайний текст'>p</a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' data-role='createlink' href='#' title='Створити посилання'><i class='fa fa-link'></i></a>
                      <a class='btn' data-role='unlink' href='#' title='Прибрати посилання'><i class='fa fa-unlink'></i></a>
                      <a class='btn' data-role='insertimage' href='#' title='Додати зображення'><i class='fa fa-image'></i></a>
                      <a class='btn' data-role='subscript' href='#' title='Нижній індекс'><i class='fas fa-subscript'></i></a>
                      <a class='btn' data-role='superscript' href='#' title='Верхній індекс'><i class='fas fa-superscript'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a class='btn' id="converToCode2" data-role='switchEditor' href='#' title='Перейти в редактор коду'>&lt;code&gt;</a>
                    </div>
                  </div>
                  <div id='editor2' style='' contenteditable></div>
                  <textarea id="desc_ru" name="description_ru"></textarea>
                  <label class="label" for="desc_ru">@lang('admin.add_ru_desc')</label>
                </div>
              </div>
            </div>
        </div>
        <div class="size-price-slide flex-col">
            <div class="size-price">
                <div class="input-wrap">
                    <input type="text" name="size/1" id="size1" class="auto-value">
                    <label class="label" for="size1">@lang('admin.add_size')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" name="price/1" id="price1" class="auto-value">
                    <label class="label" for="price1">@lang('admin.add_price')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" name="price_units/1" id="price_units1" class="auto-value">
                    <label class="label" for="price_units1">@lang('admin.add_price_units')</label>
                </div>

                <div class="input-wrap pt0">
                    <p>@lang('admin.add_available')</p>
                    <select name="available/1" class="auto-value">
                        <option value="1">@lang('admin.available')</option>
                        <option value="2">@lang('admin.not_available')</option>
                        <option value="3">@lang('admin.waiting_available')</option>
                        <option value="4">@lang('admin.available_for_order')</option>
                    </select>
                </div>

                <input type="hidden" name="sizecount" value="1">
                <hr>
            </div>
            <div class="size-price-bt-wrapp">
                <button id="delete-size-price" class="size-price-bt-min"><span class="btn-w-sp"><img src="{{ asset('img/minus-label.svg') }}" ><span>@lang('admin.delete_size_price')</span></span></button>
                <button id="add-size-price" class="size-price-bt-pl"><span class="btn-w-sp"><span>@lang('admin.add_size_price')</span><img src="{{ asset('img/plus-label.svg') }}" ></span></button>
            </div>
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

        {{-- seo --}}
        <div class="flex-col">

            <div class="flex">
                <div class="input-wrap mr-seo-input">
                    <input type="text" id="title_seo_uk" name="title_seo_uk" class="title_seo_uk">
                    <label class="label" for="title_seo_uk">@lang('admin.add_title_seo_uk')</label>
                </div>


                <div class="input-wrap">
                    <input type="text" id="title_seo_ru" name="title_seo_ru" class="title_seo_ru">
                    <label class="label" for="title_seo_ru">@lang('admin.add_title_seo')</label>
                </div>
            </div>

            <div class="flex">
                <div class="input-wrap mr-seo-input">
                    <input type="text" id="og_title_seo_uk" name="og_title_seo_uk" class="title_seo_uk">
                    <label class="label" for="og_title_seo_uk">@lang('admin.og_add_title_seo_uk')</label>
                </div>


                <div class="input-wrap">
                    <input type="text" id="og_title_seo_ru" name="og_title_seo_ru" class="title_seo_ru">
                    <label class="label" for="og_title_seo_ru">@lang('admin.og_add_title_seo')</label>
                </div>
            </div>

            <div class="flex">

                <div class="seo-textarea-wrap mr-seo-input">
                    <label  class="label seo-label" for="og_desc_seo_uk">@lang('admin.og_add_desc_seo_uk')</label>
                    <textarea class="seo-textarea" name="og_desc_seo_uk" id="" class="desc_seo_uk"></textarea>
                </div>

                <div class="seo-textarea-wrap">
                    <label  class="label seo-label" for="og_desc_seo_ru">@lang('admin.og_add_desc_seo')</label>
                    <textarea class="seo-textarea" name="og_desc_seo_ru" id="og_desc_seo_ru" class="desc_seo_ru"></textarea>
                </div>
            </div>

            <div class="flex">

                <div class="seo-textarea-wrap mr-seo-input">
                    <label  class="label seo-label" for="desc_seo_uk">@lang('admin.add_desc_seo_uk')</label>
                    <textarea class="seo-textarea" name="desc_seo_uk" id="" class="desc_seo_uk"></textarea>
                </div>

                <div class="seo-textarea-wrap">
                    <label  class="label seo-label" for="desc_seo_ru">@lang('admin.add_desc_seo')</label>
                    <textarea class="seo-textarea" name="desc_seo_ru" id="desc_seo_ru" class="desc_seo_ru"></textarea>
                </div>
            </div>

            <div class="flex">

                <div class="seo-textarea-wrap mr-seo-input">
                    <label  class="label seo-label" for="keywords_seo_uk">@lang('admin.add_key_seo_uk')</label>
                    <textarea class="seo-textarea" name="keywords_seo_uk" id="keywords_seo_uk" class="desc_seo_uk"></textarea>
                </div>

                <div class="seo-textarea-wrap">
                    <label  class="label seo-label" for="keywords_seo_ru">@lang('admin.add_key_seo')</label>
                    <textarea class="seo-textarea" name="keywords_seo_ru" id="keywords_seo_ru" class="desc_seo_ru"></textarea>
                </div>
            </div>

            <div class="flex">

                <div class="seo-textarea-wrap mr-seo-input">
                    <label  class="label seo-label" for="custom_seo_uk">@lang('admin.add_custom_seo_uk')</label>
                    <textarea class="seo-textarea" name="custom_seo_uk" id="custom_seo_uk" class="desc_seo_uk"></textarea>
                </div>

                <div class="seo-textarea-wrap">
                    <label  class="label seo-label" for="custom_seo_ru">@lang('admin.add_custom_seo')</label>
                    <textarea class="seo-textarea" name="custom_seo_ru" id="custom_seo_ru" class="desc_seo_ru"></textarea>
                </div>
            </div>
            {{-- seo end --}}

        </div>
        <script>
            function getStructure(counter) {
                return structure = `
                    <div class="input-wrap">
                        <input type="number" name="size/${counter}" id="size${counter}" class="auto-value">
                        <label class="label" for="size${counter}">@lang('admin.add_size')</label>
                    </div>

                    <div class="input-wrap">
                        <input type="number" name="price/${counter}" id="price${counter}" class="auto-value">
                        <label class="label" for="price${counter}">@lang('admin.add_price')</label>
                    </div>

                    <div class="input-wrap">
                        <input type="text" name="price_units/${counter}" id="price_units${counter}" class="auto-value">
                        <label class="label" for="price_units${counter}">@lang('admin.add_price_units')</label>
                    </div>

                    <div class="input-wrap pt0">
                        <p>@lang('admin.add_available')</p>
                        <select name="available/${counter}" class="auto-value">
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
    <script src="{{ asset('js/seo.js') }}"></script>
    <script src="{{ asset('js/simpleVisualTextEditor.js') }}"></script>
@endsection
