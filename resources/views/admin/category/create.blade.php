@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.add_category')</h2>
        <button type="submit" form="form" class="add-button">
            <img src="{{ asset('img/save.svg') }}" alt="Add">
        </button>
    </div>

    <ul class="create-list flex">
        <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
        <li><a href="#" class="name-btn">@lang('admin.another')</a></li>
    </ul>

    <form id="form" action="{{ route('category.store')}}" method="POST" class="current-slide-wrap">

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
            <div class="another-slide flex-col">
                <div class="input-wrap sub-category-wrap">
                    <p class="label">Виберіть тип товару</p>
                    <div class="flex-space sub-category-wrap">
                        <label><input type="hidden" value="" name="product_type_id"></label>

                        @foreach ($productTypes as $productType)
                            @php
                                $title = $productType->localization[0];
                            @endphp

                            <input class="radio-change" id="subCategory{{$productType->id}}" type="radio" value="{{$productType->id}}" name="product_type_id">
                            <label class="radio-label" for="subCategory{{$productType->id}}"><span class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                        @endforeach
                    </div>
                </div>
        </div>

    </form>
    <script src="{{ asset('js/create.js') }}"></script>
@endsection
