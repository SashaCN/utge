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
                <th>@lang('admin.sizeprice')</th>
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
                <td>{{$product->subcategory->localization[0]->$locale}}</td>
                <td>
                    @foreach ($product->sizeprices as $sizeprice)
                        @if ($sizeprice->size != null)
                            <p>
                                {{ $sizeprice->size }}
                                /
                                {{ $sizeprice->price }}грн
                            </p>
                        @else
                            <p>
                                {{ $sizeprice->price }}грн
                            </p>
                        @endif
                    @endforeach
                    {{-- {{dd($product->sizeprice)}} --}}
                </td>
                <td class="action">
                    <a href="{{ route('product.edit', $product->id) }}"></a>
                    <a href="{{ route('product.delete', $product->id) }}"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('product.index') }}" method="GET">
        <p>Filter</p>
        <select name="product_type_id">
            <option selected disabled value="">Пошук по типу товара</option>p
        @foreach ($producttypes as $producttype)
        @php
            $title = $producttype->localization[0];
        @endphp
            <option value="{{$producttype->id}}" @if (isset($_GET['producttype_id'])) @if ($_GET['producttype_id'] == $producttype->id) selected @endif @endif>{{ $title->$locale }}</option>
        @endforeach
        </select>

        <select name="category_id">
            <option selected disabled value="">Пошук по категорії</option>p
        @foreach ($categories as $category)
        @php
            $title = $category->localization[0];
        @endphp
            <option value="{{$category->id}}" @if (isset($_GET['category_id'])) @if ($_GET['category_id'] == $category->id) selected @endif @endif>{{ $title->$locale }}</option>
        @endforeach
        </select>

        <select name="sub_category_id">
            <option selected disabled value="">Пошук по суб-категорії</option>p
        @foreach ($subcategories as $subcategory)
        @php
            $title = $subcategory->localization[0];
        @endphp
            <option value="{{$subcategory->id}}" @if (isset($_GET['sub_category_id'])) @if ($_GET['sub_category_id'] == $subcategory->id) selected @endif @endif>{{ $title->$locale }}</option>
        @endforeach
        </select>



        {{-- <input type="text" name="search_field" @if (isset($_GET['search_field'])) value="{{($_GET['search_field'])}}" @endif> --}}

        <input type="submit" value="filter">

    </form>

    <div class="pagination">
        {{ $products->withQueryString()->links('vendor.pagination.utge-pagination') }}
    </div>

    @endsection
