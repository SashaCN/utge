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
    </ul>

    <form id="form" action="{{ route('newsCategory.store')}}" method="POST" class="current-slide-wrap">

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

    </form>
@endsection