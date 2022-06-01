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
        <h2>@lang('admin.product_list')</h2>
        <a href="{{ route('product.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>
    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.filters')</th>
                <th>@lang('admin.price')</th>
                <th>@lang('admin.article')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="product-image"><img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->localization[0]->$title }}"></td>
                <td>{{$product->localization[0]->$title}}</td>
                <td>
                    <ul>
                        @foreach ($product->categories as $category)
                            <li><a href="{{ route('category.show', $category) }}">{{ $category->localization[0]->$title }}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->article}}</td>
                <td class="action">
                    <a href="{{ route('product.edit', $product->id) }}"></a>
                    <a href="{{ route('product.delete', $product->id) }}"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
