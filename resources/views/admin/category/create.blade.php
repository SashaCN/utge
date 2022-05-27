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

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title_uk" placeholder="category title"></label>
        <label><input type="text" name="title_ru" placeholder="category title"></label>

        <p>Оберіть до якого типу продукту буде відноситись категорія</p>

        @foreach ($productTypes as $productType)
            <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->localization[0]->$title}}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
