@extends('admin.admin')

@section('content')

@php
$locale = app()->getLocale();
@endphp

@php
$title = $subCategory->localization[0];
@endphp

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="flex title-line">
    <h2>@lang('admin.subcategory_change')</h2>
    <button type="submit" form="form" class="add-button">
        <img src="{{ asset('img/save.svg') }}" alt="Add">
    </button>
</div>

<ul class="create-list flex">
    <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
    <li><a href="#" class="another-btn">@lang('admin.another')</a></li>
</ul>

<form id="form" class="current-slide-wrap" action="{{ route('subCategory.update', $subCategory->id) }}" method="POST">
    @csrf
    @method('PUT')

    @php
    $title = $subCategory->localization[0];
    @endphp

    <div class="name-slide flex-col current-slide">
        <div class="input-wrap">
            <input type="text" name="title_uk" id="title_uk" value="{{ $title->uk }}">
            <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
        </div>
        <div class="input-wrap">
            <input type="text" name="title_ru" id="title_ru" value="{{ $title->ru }}">
            <label class="label" for="title_ru">@lang('admin.add_ru_title')</label>
        </div>
    </div>

    <div class="desc-slide flex-col">
        <div class="another-slide flex-col">
            <div class="input-wrap sub-category-wrap">
                <p class="label">Виберіть категорію</p>
                <div class="flex-space sub-category-wrap">

                    @foreach ($categories as $category)
                    @php
                    $title = $category->localization[0];
                    @endphp

                    @if ($category->id == $subCategory->category_id)

                    <input class="radio-change" id="subCategory{{$category->id}}" type="radio" value="{{$category->id}}"
                        name="categories_id" checked>
                    <label class="radio-label" for="subCategory{{$category->id}}"><span
                            class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                    @else
                    <input class="radio-change" id="subCategoryNon{{$category->id}}" type="radio"
                        value="{{$category->id}}" name="categories_id">
                    <label class="radio-label" for="subCategoryNon{{$category->id}}"><span
                            class="label-circle"></span><span class="label-desc">{{ $title->$locale }}</span></label>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('js/create.js') }}"></script>
@endsection
