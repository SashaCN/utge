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
        <a href="{{ route('product.create') }}" class="action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>
    <table class="product-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Article</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="product-image"><img src="{{ $product->getFirstMediaUrl('images') }}" alt=""></td>
                <td>{{$product->localization[0]->$title}}</td>
                <td>{{$product->localization[0]->$description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <ul>
                        @foreach ($product->categories as $category)
                            <li><a href="{{ route('category.show', $category) }}">{{ $category->localization[0]->$title }}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$product->price}}</td>
                <td class="action">
                    <a href="{{ route('product.show', $product->id) }}" class="action-button">
                        <img src="{{ asset('img/show.svg') }}" alt="Show">
                    </a>
                    <a href="{{ route('product.edit', $product->id) }}" class="action-button">
                        <img src="{{ asset('img/edit.svg') }}" alt="Edit">
                    </a>
                    <a href="{{ route('product.delete', $product->id) }}" class="action-button">
                        <img src="{{ asset('img/delete.svg') }}" alt="Delete">
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
