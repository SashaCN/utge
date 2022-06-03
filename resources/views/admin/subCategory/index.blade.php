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

    <table>
        <tr>
            <th>Title</th>
            <th>action</th>
        </tr>
        @foreach ($subCategories as $subCategory)

        @php
            $title = $subCategory->localization[0];
        @endphp

        <tr>
            <td>{{ $title->$locale }}</td>
            <td>
                <a href="{{ route('subCategory.show', $subCategory->id) }}">show</a>
                <a href="{{ route('subCategory.edit', $subCategory->id) }}">update</a>
                <a href="{{ route('subCategory.delete', $subCategory->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
