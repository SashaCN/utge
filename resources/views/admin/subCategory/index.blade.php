@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.subcategory_list')</h2>
        <a href="{{ route('category.create') }}" class="add-button action-button">
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
            $title = $subCategory->localization[0];
        @endphp

        <tr>
            <td>{{ $title->$locale }}</td>
            <td class="action">
                <a href="{{ route('subCategory.edit', $subCategory->id) }}"></a>
                <a href="{{ route('subCategory.delete', $subCategory->id) }}"></a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
