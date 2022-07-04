@extends('admin.admin')

@section('content')
<div class="error">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
            <div class="error-item"><img class="error-icon" src="{{ asset('img/error.svg') }}" alt="error"><p class="error-desc">{{ $error }}</p></div>
      @endforeach
    @endif
</div>

  <div class="flex title-line">
      <h2>@lang('admin.childPage_create')</h2>
      <button type="submit" form="form" class="add-button" id="save-btn">
          <img src="{{ asset('img/save.svg') }}" alt="Add">
      </button>
  </div>

  <ul class="create-list flex">
      <li><a href="#" class="another-btn current-btn">@lang('admin.block')</a></li>
      <li><a href="#" class="name-btn">@lang('admin.title')</a></li>
      <li><a href="#" class="photo-btn" display="none">@lang('admin.photo')</a></li>
  </ul>

  <form id="form" action="{{ route('childPage.store') }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">
      @csrf

    <div class="another-slide flex-col current-slide">
        <div class="input-wrap pt0">
            <select name="route" id="child-page-select" class="auto-value">
                <option value="" id="child-page-first-option" selected>@lang('admin.child_page_father')</option>
                <option disabled style="background: grey; color: white;">------слайдери------</option>
                <option value="slider1">slider1</option>
                <option value="slider2">slider2</option>
                <option value="slider3">slider3</option>
                <option value="slider4">slider4</option>
            </select>
        </div>
    </div>


    <div class="name-slide flex-col">
        <div class="input-wrap name-box">
            <input type="text" name="title_uk" id="title_uk" value="{{ old('title_uk') }}" class="name-input-uk">
            <label class="label" for="title_uk">@lang('admin.add_uk_title')</label>
        </div>
        <div class="input-wrap name-box">
            <input type="text" name="title_ru" value="{{ old('title_ru') }}" id="title_ru" class="name-input-ru">
            <label class="label" for="title_ru">@lang('admin.add_ru_title')</label>
        </div>
        <div class="input-wrap name-box">
            <input type="text" name="img_a_url" value="{{ old('img_a_url') }}" id="img_a_url" class="name-input-ru">
            <label class="label" for="img_a_url">url</label>
        </div>
    </div>

    <div class="image-slide flex-col">
      <div class="input-wrap">
          <label><input type="hidden" name="image" class="img-input" value=""></label>
          <label><input type="file" name="image" class="img-input"></label>
      </div>
    </div>

  </form>

  <script src="{{ asset('js/create.js') }}"></script>
  <script src="{{ asset('js/childPage.js') }}"></script>
  <script src="{{ asset('js/simpleVisualTextEditor.js') }}"></script>
@endsection