@extends('admin.admin')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.news_create')</h2>
        <button type="submit" form="form" class="add-button">
            <img src="{{ asset('img/save.svg') }}" alt="Add">
        </button>
    </div>

    <ul class="create-list flex">
        <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
        <li><a href="#" class="desc-btn">@lang('admin.description')</a></li>
        <li><a href="#" class="photo-btn">@lang('admin.photo')</a></li>
    </ul>

    <form id="form" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">
        @csrf

        <div class="name-slide flex-col current-slide">
            <div class="input-wrap">
                <input type="text" name="title_uk" id="title_uk">
                <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
            </div>
            <div class="input-wrap">
                <input type="text" name="title_ru" id="title_ru">
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

        <div class="image-slide flex-col">
            <label><input type="hidden" name="image" value=""></label>
            <label><input type="file" name="image"></label>
        </div>

    </form>

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
