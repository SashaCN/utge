@extends('admin.admin')
@section('content')

    <?php

    if (app()->getLocale() == 'uk') {
        $title = 'title_uk';
        $description = 'description_uk';
    } elseif (app()->getLocale() == 'ru') {
        $title = 'title_ru';
        $description = 'description_ru';
    }

    ?>  

    <div class="flex title-line">
        <h2>@lang('admin.product_create')</h2>
        <a href="{{ route('product.create') }}" class="action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <ul class="create-list flex">
        <li><a href="#">@lang('admin.title')</a></li>
        <li><a href="#">@lang('admin.description')</a></li>
        <li><a href="#">@lang('admin.article')</a></li>
        <li><a href="#">Ціна</a></li>
        <li><a href="#">Фото</a></li>
    </ul>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <p>
            <input type="text" id="title_uk" name="title_uk">
            <label for="title_uk">@lang('admin.add_uk_title')</label>
        </p>
        <p>
            <input type="text" id="title_ru" name="title_ru">
            <label for="title_ru">@lang('admin.add_ru_title')</label>
        </p>


        @error('title')
            <p>{{$message}}</p>
        @enderror

        <p>Доступність товару</p>
        <select name="available">
            <option value="1">В наявності</option>
            <option value="2">Очікується</option>
            <option value="3">Немає в наявності</option>
        </select>

        <p>Показ на головній сторінці</p>
        <select name="home_view">
            <option value="0">Не показувати на головній</option>
            <option value="1">Показувати на головній</option>
        </select>

        <p>
            <label>Ціна<input type="number" name="price"></label>
        </p>

        @error('price')
            <p>{{$message}}</p>
        @enderror

        <label>Виберіть тип товару
            @foreach ($producttypes as $producttype)
                <input type="radio" name="producttypes[]" value="{{ $producttype->id }}">{{ $producttype->localization[0]->$title }}
            @endforeach
        </label>

        <label>Виберіть категорію
            @foreach ($categories as $category)
                <input type="radio" name="categories[]" value="{{ $category->id }}">{{ $category->localization[0]->$title }}
            @endforeach
        </label>

        <label>Виберіть під-категорію
            @foreach ($subcategories as $subcategory)
                <input type="checkbox" name="subcategories[]" value="{{ $subcategory->id }}">{{ $subcategory->localization[0]->$title }}
            @endforeach
        </label>

        @error('category')
            <p>{{$message}}</p>
        @enderror

        @error('max_order')
            <p>{{$message}}</p>
        @enderror

        <p>
            <label>Позиція в списку<input type="number" name="list_position"></label>
        </p>

        @error('list_position')
            <p>{{$message}}</p>
        @enderror

        <p>Опис товару</p>

        <textarea name="description_uk" cols="30" rows="10" placeholder="Опис на укр"></textarea>
        <textarea name="description_ru" cols="30" rows="10" placeholder="Опис на рос"></textarea>


        @error('description')
            <p>{{$message}}</p>
        @enderror

        @error('image')
        <p>{{$message}}</p>
        @enderror

        <label><input type="file" name="image"></label>

        <label><input type="text" name="alt"></label>
        <input type="submit" value="Send">
    </form>
@endsection
