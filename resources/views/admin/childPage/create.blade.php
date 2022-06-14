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
      <h2>@lang('admin.childPage_create')</h2>
      <button type="submit" form="form" class="add-button" id="save-btm">
          <img src="{{ asset('img/save.svg') }}" alt="Add">
      </button>
  </div>

  <ul class="create-list flex">
      <li><a href="#" class="name-btn current-btn">@lang('admin.title')</a></li>
      <li><a href="#" class="desc-btn">@lang('admin.description')</a></li>
      <li><a class="another-btn">@lang('admin.another')</a></li>
      <li><a href="#" class="photo-btn" display="none">@lang('admin.photo')</a></li>
  </ul>

  <form id="form" action="{{ route('childPage.store') }}" method="POST" enctype="multipart/form-data" class="current-slide-wrap">
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

    <div class="input-wrap pt0">
        <select name="route" id="child-page-select" class="auto-value">
            <option value="" id="child-page-first-option" selected>@lang('admin.child_page_father')</option>
            <option value="about_us">@lang('utge.about-us')</option>
            <option value="delivery">@lang('utge.delivery')</option>
            <option value="payment">@lang('utge.payment')</option>
            <option value="contacts">@lang('utge.contacts')</option>
        </select>
    </div>     

    <div class="image-slide flex-col">
      <p>@lang('admin.first_create_image')</p>
    </div>

  </form>

  <script src="{{ asset('js/create.js') }}"></script>
  <script src="{{ asset('js/childPage.js') }}"></script>
  <script src="{{ asset('js/simpleVisualTextEditor.js') }}"></script>
@endsection
