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

    <form action="{{ route('subCategory.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title_uk" placeholder="category title"></label>
        <label><input type="text" name="title_ru" placeholder="category title"></label>

        <p>Оберіть до якої категорії буде відноситись під-категорія</p>

        @foreach ($categories as $category)
            <label><input type="radio" name="category_id" value="{{ $category->id }}">{{ $category->localization[0]->$title}}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
