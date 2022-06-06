@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.product_type_list')</h2>
        <a href="{{ route('productType.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)

            @php
                $title = $productType->localization[0];
            @endphp

            <tr>
                <td>{{ $title->$locale }}</td>
                <td class="action">
                    <a href="{{ route('category.edit', $productType->id) }}"></a>
                    <a href="{{ route('category.delete', $productType->id) }}"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection


