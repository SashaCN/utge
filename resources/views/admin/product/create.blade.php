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

        <input type="text" id="title_uk" name="title_uk">
        <label for="title_uk">@lang('admin.add_uk_title')</label>
        <input type="text" id="title_ru" name="title_ru">
        <label for="title_ru">@lang('admin.add_ru_title')</label>


        @error('title')
            <p>{{$message}}</p>
        @enderror

        <label>Артикул<input type="text" name="article"></label>

        @error('article')
            <p>{{$message}}</p>
        @enderror

        <p>Доступність товару</p>
        <select name="available">
            <option value="1">В наявності</option>
            <option value="2">Очікується</option>
            <option value="3">Немає в наявності</option>
        </select>

        <p>Доставка товару</p>
        <select name="shipable">
            <option value="1">Доступна доставка</option>
            <option value="2">Немає доставки</option>
        </select>

        <label>Ціна<input type="number" name="price"></label>

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

        <label>Максимальна кількість замовлення<input type="number" name="max_order"></label>

        @error('max_order')
            <p>{{$message}}</p>
        @enderror

        <label>Позиція в списку<input type="number" name="list_position"></label>

        @error('list_position')
            <p>{{$message}}</p>
        @enderror

        <p>Опис товару</p>





        <textarea id="desc" name="description_uk" cols="30" rows="10"></textarea>
        <textarea name="description_ru" cols="30" rows="10"></textarea>


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
    @livewireStyles
        <livewire:counter />
    @livewireScripts
@endsection
