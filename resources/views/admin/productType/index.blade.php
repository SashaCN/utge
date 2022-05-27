@extends('admin.admin')

@section('content')

    <?php

    if (app()->getLocale() == 'uk') {
        $title = 'title_uk';
        $description = 'description_uk';
    } elseif (app()->getLocale() == 'ru') {
        $title = 'title_ru';
        $description = 'description_ru';
    }

    ?>

    {{-- {{ dd($localizations) }} --}}

    <table>
        <a href="{{ route('productType.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach ($productTypes as $productType)
        <tr>
            <td>
                {{ $productType->localization[0]->$description }}
            </td>
            <td>
                <a href="{{ route('productType.show', $productType->id) }}">show</a>
                <a href="{{ route('productType.edit', $productType->id) }}">update</a>
                <a href="{{ route('productType.delete', $productType->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
