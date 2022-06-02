@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.category_change')</h2>
        <a href="{{ route('category.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <form action="{{ route('category.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        @php
            $title = $category->localization[0];
        @endphp

        <label>
            <input type="text" name="title_uk" value="{{ $title->uk }}">
        </label>

        <label>
            <input type="text" name="title_ru" value="{{ $title->ru }}">
        </label>

        <p>category belong to product type</p>

        @foreach ($productTypes as $productType)

            @php
                $title = $productType->localization[0];
            @endphp

            @if ($productType->id == $category->product_type_id)

                <label>
                    <input type="radio" name="product_type_id" value="{{ $productType->id }}" checked>{{ $title->$locale }}
                </label>

            @else

                <label>
                    <input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $title->$locale }}
                </label>

            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
