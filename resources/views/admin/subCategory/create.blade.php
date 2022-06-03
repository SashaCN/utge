@extends('admin.admin')

@section('content')
    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
        <h2>@lang('admin.add_subcategory')</h2>
    </div>

    <form action="{{ route('subCategory.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title_uk" placeholder="category title"></label>
        <label><input type="text" name="title_ru" placeholder="category title"></label>

        <p>@lang('admin.choose_type')</p>

        @foreach ($categories as $category)

            @php
                $title = $category->localization[0];
            @endphp

            <label><input type="radio" name="category_id" value="{{ $category->id }}">{{ $title->$locale }}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
