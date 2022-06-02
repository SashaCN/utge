@extends('admin.admin')
    @section('content')

    <?php
        $locale = app()->getLocale();
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
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            @php
                $title = $product->localization[0];
                $description = $product->localization[1];
            @endphp
            <tr>
                <td class="product-image"><img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></td>
                <td>{{$title->$locale}}</td>
                <td>
                    <ul>
                        @foreach ($product->categories as $category)
                            <li><a href="{{ route('category.show', $category) }}">{{ $category->localization[0]->$title }}</a></li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$product->price}}</td>
                <td class="action">
                    <a href="{{ route('product.edit', $product->id) }}"></a>
                    <a href="{{ route('product.delete', $product->id) }}"></a>
                </td>
            </tr>
            @endforeach
            {{ $products->withQueryString()->links('vendor.pagination.bootstrap-5') }}
        </tbody>
    </table>
    @endsection
