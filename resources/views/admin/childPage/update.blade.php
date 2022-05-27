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

    <form action="{{ route('childPage.update', $childPage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="route" placeholder="route" value="{{ $childPage->route }}"></label>
        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk" value="{{ $childPage->localization[0]->title_uk }}"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk" value="{{ $childPage->localization[0]->description_uk }}"></label>
        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru" value="{{ $childPage->localization[0]->title_ru }}"></label>
        <label><input type="text" name="description_ru" placeholder="description_ru" value="{{ $childPage->localization[0]->description_ru }}"></label>

        <label><input type="submit" value="Send"></label>
    </form>
@endsection