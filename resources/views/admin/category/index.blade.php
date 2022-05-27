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

    <table>
        <a href="{{ route('productType.create') }}">Create Product type</a>
        <tr>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->localization[0]->$title}}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}">update</a>
                <a href="{{ route('category.delete', $category->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
