@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.add_category')</h2>
    </div>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <label><input type="text" name="title_uk"></label>
        <label><input type="text" name="title_ru"></label>

        <p>Оберіть до якого типу продукту буде відноситись категорія</p>

        @foreach ($productTypes as $productType)

            @php
                $title = $productType->localization[0];
            @endphp

            <label>
                <input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $title->$locale }}
            </label>

        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
