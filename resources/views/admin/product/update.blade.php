@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex title-line">
    <h2>@lang('admin.product_change')</h2>
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

    <form id="form" action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">

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
                <textarea name="description_uk" id="desc_uk" cols="30" rows="10">{{ $description->uk }}</textarea>
                <label class="label" for="desc_uk">@lang('admin.add_uk_desc')</label>
            </div>
            <div class="input-wrap">
                <textarea name="description_ru" id="desc_ru" cols="30" rows="10">{{ $description->ru }}</textarea>
                <label class="label" for="desc_ru">@lang('admin.add_ru_desc')</label>
            </div>
        </div>

        <div class="size-price-slide flex-col">
            @foreach ($product->sizeprices as $sizeprice)
            <div class="input-wrap">
                <input type="text" value="{{ $sizeprice->size }}" name="size" id="size">
                <label class="label" for="size">@lang('admin.add_size')</label>
            </div>

            <div class="input-wrap">
                <input type="text" value="{{ $sizeprice->price }}" name="price" id="price">
                <label class="label" for="price">@lang('admin.add_price')</label>
            </div>
            @endforeach
        </div>

        <div class="image-slide flex-col">


            <label class="image-changes" for="image-changes"><img class="old-image" src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label>
            <p class="image-changes-desc">@lang('admin.update-image')</p>

            <button class="image-changes-bt" type="submit" form="image-change" class="add-button">@lang('admin.save-new-phot')</button>

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
                            <input class="radio-change" id="subCategory{{$subCategory->id}}" type="radio" value="{{$subCategory->id}}" name="sub_category_id" checked>
                            <label class="radio-label" for="subCategory{{$subCategory->id}}"><span class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                        @else
                            <input class="radio-change" id="subCategoryNon{{$subCategory->id}}" type="radio" value="{{$subCategory->id}}" name="sub_category_id">
                            <label class="radio-label" for="subCategoryNon{{$subCategory->id}}"><span class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="input-wrap">
                <p>@lang('admin.add_available')</p>
                <select name="available">
                    @if ($product->available == 1)
                        <option selected value="1">@lang('admin.available')</option>
                        <option value="2">@lang('admin.not_available')</option>
                        <option value="3">@lang('admin.waiting_available')</option>
                    @elseif ($product->available == 2)
                        <option value="1">@lang('admin.available')</option>
                        <option selected  value="2">@lang('admin.not_available')</option>
                        <option value="3">@lang('admin.waiting_available')</option>
                    @elseif ($product->available == 3)
                        <option value="1">@lang('admin.available')</option>
                        <option value="2">@lang('admin.not_available')</option>
                        <option selected value="3">@lang('admin.waiting_available')</option>
                    @endif
                </select>
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


    <form id="image-change" class="image-changes-form"  action="{{ route('product.mediaUpdate', $product->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <input id="image-changes" type="file" name="image">
        <input type="submit" value="img">
    </form>

    <script src="{{ asset('js/create.js') }}"></script>
@endsection

`
