@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.product_category_list')</h2>
        <a href="{{ route('category.create') }}" class="add-button action-button">
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
            @foreach ($categories as $category)

            @php
                $title = $category->localization[0];
            @endphp

            <tr>
                <td>{{ $title->$locale }}</td>
                <td class="action">
                    <a title="Редагувати" href="{{ route('category.edit', $category->id) }}"></a>
                    <a title="Видалити" href="{{ route('category.delete', $category->id) }}"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
