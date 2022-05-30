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

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title_uk" value="{{ $category->localization[0]->title_uk }}" placeholder="category title"></label>
        <label><input type="text" name="title_ru" value="{{ $category->localization[0]->title_ru }}" placeholder="category title"></label>
        <p>category belong to product type</p>

        @foreach ($productTypes as $productType)

            @if ($productType->id == $category->product_type_id)
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}" checked>{{ $productType->localization[0]->$title  }}</label>
            @else
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->localization[0]->$title }}</label>
            @endif

        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
