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

    <table>

        <tr>
            <th>@lang('admin.title')</th>
            <th>@lang('admin.action')</th>
        </tr>

        @foreach ($productTypes as $productType)

        @php
            $title = $productType->localization[0];
        @endphp

        <tr>
            <td>
                {{ $title->$locale }}
            </td>
            <td>
                <a href="{{ route('productType.show', $productType->id) }}"> show </a>
                <a href="{{ route('productType.delete', $productType->id) }}"> delete</a>
            </td>
        </tr>

        @endforeach

    </table>

@endsection
