@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.subcategory_change')</h2>
    </div>


    <form action="{{ route('subCategory.update', $subCategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        @php
            $title = $subCategory->localization[0];
        @endphp

        <label>
            <input type="text" name="title_uk" value="{{ $title->uk }}">
        </label>

        <label>
            <input type="text" name="title_ru" value="{{ $title->ru }}">
        </label>

        <p>subCategory belong to category</p>

        @foreach ($categories as $category)
            <label><input type="hidden" value="" name="category_id"></label>
            
            @php
                $title = $category->localization[0];
            @endphp

            @if ($category->id == $subCategory->category_id)
                <label><input type="radio" name="category_id" value="{{ $category->id }}" checked>{{ $title->$locale }}</label>
            @else
                <label><input type="radio" name="category_id" value="{{ $category->id }}">{{ $title->$locale }}</label>
            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
