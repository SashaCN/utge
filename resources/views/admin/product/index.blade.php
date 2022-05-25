@extends('admin.admin')
    @section('content')
    <div class="flex title-line">
        <h2>Список товарів</h2>
        <a href="{{ route('product.create') }}" class="add-button">
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
                <td class="product-image"><img src="{{ asset($product->image->url) }}" alt="{{ $product->image->alt }}"></td>
                @if (app()->getLocale() == 'uk')
                    <td>{{$product->localization[0]->title_uk}}</td>
                @else
                    <td>{{$product->localization[0]->title_ru}}</td>
                @endif

                @if (app()->getLocale() == 'uk')
                    <td>{{$product->localization[0]->description_uk}}</td>
                @else
                    <td>{{$product->localization[0]->description_ru}}</td>
                @endif
                <td>{{$product->price}}</td>
                <td>
                    <ul>
                        @foreach ($product->categories as $category)
                            <li><a href="{{ route('category.show', $category) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$product->price}}</td>
                <td class="action">
                    <p><a href="{{ route('product.show', $product->id) }}">Show</a></p>
                    <p><a href="{{ route('product.edit', $product->id) }}">Edit</a></p>
                    <p><a href="{{ route('product.delete', $product->id) }}">Delete</a></p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
