@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.category_list')</h2>
        <a href="{{ route('category.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <table>

        <tr>
            <th>@lang('admin.title')</th>
            <th>@lang('admin.action')</th>
        </tr>

        @foreach ($categories as $category)
        
        @php
            $title = $category->localization[0];
        @endphp

        <tr>
            <td>{{ $title->$locale }}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}">update</a>
                <a href="{{ route('category.delete', $category->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
