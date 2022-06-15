@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp


@if ($errors->any())
<div class="alert alert-danger">
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
</div>
@endif

<div class="flex title-line">
    <h2>@lang('admin.product_change')</h2>
    <button id="save-btm" type="submit" form="form" class="add-button">
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

<form id="form" action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data"
    class="current-slide-wrap">

    @csrf
    @method('PUT')

    @php
    $title = $product->localization[0];
    $description = $product->localization[1];
    @endphp

    <div class="name-slide flex-col current-slide">
        <div class="input-wrap">
            <input type="text" value="{{ $title->uk }}" id="title_uk" name="title_uk">
            <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
        </div>
        <div class="input-wrap">
            <input type="text" value="{{ $title->ru}}" id="title_ru" name="title_ru">
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
              <div id='editor1' style='' contenteditable>{!! $description->uk !!}</div>
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
              <div id='editor2' style='' contenteditable>{!! $description->ru !!}</div>
              <textarea id="desc_ru" name="description_ru"></textarea>
              <label class="label" for="desc_ru">@lang('admin.add_ru_desc')</label>
            </div>
          </div>
        </div>
    </div>

    <div class="size-price-slide flex-col">
        @php
            $counter = 0;
        @endphp

        <div class="size-price">

            @foreach ($product->sizeprices as $sizeprice)

                @php
                $counter++;
                @endphp

                <div class="input-wrap">
                    <input type="text" value="{{ $sizeprice->size }}" name="size/{{$counter}}" id="size{{$counter}}">
                    <label class="label" for="size{{$counter}}">@lang('admin.add_size')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" value="{{ $sizeprice->price }}" name="price/{{$counter}}" id="price{{$counter}}">
                    <label class="label" for="price">@lang('admin.add_price')</label>
                </div>

                <div class="input-wrap">
                    <input type="text" value="{{ $sizeprice->price_units }}" name="price_units/{{$counter}}" id="price_units{{$counter}}" class="auto-value">
                    <label class="label" for="price_units{{$counter}}">@lang('admin.add_price_units')</label>
                </div>

                <div class="input-wrap pt0">
                    <p>@lang('admin.add_available')</p>
                    <select name="available/{{$counter}}">
                        @if ($sizeprice->available == 1)
                            <option value="1" selected>@lang('admin.available')</option>
                        @else
                            <option value="1">@lang('admin.available')</option>
                        @endif
                        @if ($sizeprice->available == 2)
                            <option value="2" selected>@lang('admin.not_available')</option>
                        @else
                            <option value="2">@lang('admin.not_available')</option>
                        @endif
                        @if ($sizeprice->available == 3)
                            <option value="3" selected>@lang('admin.waiting_available')</option>
                        @else
                            <option value="3">@lang('admin.waiting_available')</option>
                        @endif
                        @if ($sizeprice->available == 4)
                            <option value="4" selected>@lang('admin.available_for_order')</option>
                        @else
                            <option value="4">@lang('admin.available_for_order')</option>
                        @endif
                    </select>
                </div>
                <hr>
            @endforeach

        </div>

        <input type="hidden" name="counter" value="{{ $counter }}">
        <div class="size-price-bt-wrapp">
            <button id="delete-size-price" class="size-price-bt-min"><span class="btn-w-sp"><img src="{{ asset('img/minus-label.svg') }}" ><span>@lang('admin.delete_size_price')</span></span></button>
            <button id="add-size-price" class="size-price-bt-pl"><span class="btn-w-sp"><span>@lang('admin.add_size_price')</span><img src="{{ asset('img/plus-label.svg') }}" ></span></button>
        </div>
    </div>

    <div class="image-slide flex-col">


        <label class="image-changes" for="image-changes"><img class="old-image"
                src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label>
        <p class="image-changes-desc">@lang('admin.update-image')</p>

        <button class="image-changes-bt" type="submit" form="image-change"
            class="add-button">@lang('admin.save-new-phot')</button>

    </div>

    <div class="another-slide flex-col">
        <div class="input-wrap sub-category-wrap">
            <p class="label">Виберіть під-категорію</p>
            <ul class="flex-space sub-category-wrap">
                <label><input type="hidden" name="sub_category_id"></label>
                @foreach ($subCategories as $subCategory)
                @php
                $title = $subCategory->localization[0];
                @endphp

                @if ($subCategory->id == $product->sub_category_id)
                <input class="radio-change" id="subCategory{{$subCategory->id}}" type="radio"
                    value="{{$subCategory->id}}" name="sub_category_id" checked>
                <label class="radio-label" for="subCategory{{$subCategory->id}}"><span class="label-circle"></span><span
                        class="label-desc">{{ $title->$locale }}</span></label>
                @else
                <input class="radio-change" id="subCategoryNon{{$subCategory->id}}" type="radio"
                    value="{{$subCategory->id}}" name="sub_category_id">
                <label class="radio-label" for="subCategoryNon{{$subCategory->id}}"><span
                        class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                @endif
                @endforeach
            </ul>
        </div>

        <div class="input-wrap">
            <p>@lang('admin.add_home_view')</p>
            <select name="home_view">
                @if ($product->home_view == 0)
                <option value="1">@lang('admin.home_view')</option>
                <option selected value="0">@lang('admin.not_home_view')</option>
                @elseif ($product->home_view == 1)
                <option selected value="1">@lang('admin.home_view')</option>
                <option value="0">@lang('admin.not_home_view')</option>
                @endif
            </select>
        </div>
        <div class="input-wrap">
            <input type="number" name="list_position" value="{{ $product->list_position }}" id="list_pos">
            <label for="list_pos" class="label">@lang('admin.add_list_position')</label>
        </div>
    </div>
</form>


<form id="image-change" class="image-changes-form" action="{{ route('product.mediaUpdate', $product->id ) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <input id="image-changes" type="file" name="image">
    <input type="submit" value="img">
</form>

<script>
    getStructure();

    function getStructure(counter) {
        let structure = document.querySelector('.size-price').innerHTML;
        return structure;
    }

</script>
<script src="{{ asset('js/sizeprice.js') }}"></script>
<script src="{{ asset('js/create.js') }}"></script>
<script src="{{ asset('js/simpleVisualTextEditor.js') }}"></script>
@endsection

`
