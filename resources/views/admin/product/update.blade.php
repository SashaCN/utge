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

    <form action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label><input type="text" value="{{ $product->localization[0]->title_uk }}" name="title">title</label>
        <label><input type="text" value="{{ $product->article }}" name="article">article</label>

        <p>Доступність товару</p>
        @if ( $product->available == 3 )
        <option value="1">В наявності</option>
        <option value="2">Очікується</option>
        <option selected value="3">Немає в наявності</option>
        @else

        @endif
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

        @if ( $product->available == 1 )
            <label>
                <input type="radio" checked value="1" name="available">
                <input type="radio" value="0" name="available">
                available
            </label>
        @else
            <label>
                <input type="radio" value="1" name="available">
                <input type="radio" checked value="0" name="available">
                available
            </label>
        @endif

        <label><input type="number" name="price" value="{{ $product->price }}"></label>

        @foreach ($categories as $category)

            <?php $isChecked = false ?>

            @foreach ($selected_categories as $selected_category)

                @if ( $category->id == $selected_category->id)
                    <?php $isChecked = true ?>
                @endif
                
            @endforeach

            @if ($isChecked == true)
                <label><input type="checkbox" checked name="categories[]" value="{{ $category->id }}">{{ $category->localization[0]->$title }}</label>
            @else
                <label><input type="checkbox"  name="categories[]" value="{{ $category->id }}">{{ $category->localization[0]->$title }}</label>
            @endif


        @endforeach

        <label><input type="number" value="{{ $product->max_order }}" name="max_order"></label>
        <label><input type="number" value="{{ $product->list_position }}" name="list_position"></label>

        <textarea name="description" cols="30" rows="10">{{ $product->description }}</textarea>

        {{-- <img src="{{ $product->image->url }}" alt="{{ $product->image->alt }}"> --}}
        <label><input type="file" name="image"></label>
        {{-- <label><input type="text" value="{{ $product->image->alt }}" name="alt"></label> --}}
        <input type="submit" value="Send">
    </form>
@endsection

