@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.product_subcategory_list')</h2>
        <a href="{{ route('subCategory.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <table class="product-table">
        <tr>
            <th>@lang('admin.title')</th>
            <th>@lang('admin.action')</th>
        </tr>
        @foreach ($subCategories as $subCategory)

        @php

            if (isset($subCategory->localization[1]))
            {
                $title = $subCategory->localization[1];
            } else {
                $title = 'something went wrong with title';
            }

        @endphp

        <tr>
            
            <td>@if (isset($title->$locale)) {{ $title->$locale }} @else title not found @endif</td>
            <td class="action">
                <a title="Редагувати" href="{{ route('subCategory.edit', $subCategory->id) }}"></a>
                <a title="Видалити" href="{{ route('subCategory.delete', $subCategory->id) }}"></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
