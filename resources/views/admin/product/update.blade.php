@extends('admin.admin')

@section('content')

    @php
        $locale = app()->getLocale();
    @endphp

    <div class="flex title-line">
    <h2>@lang('admin.product_change')</h2>
        <a href="{{ route('product.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <form action="{{ route('product.update', $product->id ) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @php
            $title = $product->localization[0];
            $description = $product->localization[1];
        @endphp

        <label><input type="text" value="{{ $title->uk }}" name="title_uk">title</label>
        <label><input type="text" value="{{ $title->ru }}" name="title_ru">title</label>

        <p>Доступність товару</p>

        <select name="available">
            @if ( $product->available == 1 )
                <option value="1" selected>В наявності</option>
                <option value="2">Очікується</option>
                <option value="3">Немає в наявності</option>
            @elseif ( $product->available == 2 )
                <option value="1">В наявності</option>
                <option value="2" selected>Очікується</option>
                <option value="3">Немає в наявності</option>
            @else
                <option value="1">В наявності</option>
                <option value="2">Очікується</option>
                <option value="3" selected>Немає в наявності</option>
            @endif
        </select>

        @foreach ($product->sizeprices as $sizeprice)

            <input type="text" name="price" value="{{ $sizeprice->price }}">
            <input type="text" name="size" value="{{ $sizeprice->size }}">

        @endforeach

        @foreach ($subCategories as $subCategory)
            @php
                $title = $subCategory->localization[0];
            @endphp
            
            @if ($subCategory->id == $product->sub_category_id)
                <label><input type="radio" value="{{$subCategory->id}}" name="sub_category_id" checked>{{ $title->$locale }}</label>
            @else
                <label><input type="radio" value="{{$subCategory->id}}" name="sub_category_id">{{ $title->$locale }}</label>
            @endif
        @endforeach`

        <label><input type="number" value="{{ $product->list_position }}" name="list_position"></label>

        <textarea name="description_uk" cols="30" rows="10">{{ $description->uk }}</textarea>
        <textarea name="description_ru" cols="30" rows="10">{{ $description->ru }}</textarea>

        <input type="submit" value="Send">
    </form>

    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->localization[0]->$title }}">

    <form action="{{ route('product.mediaUpdate', $product->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <label><input type="file" name="image"></label>
        <input type="submit" value="img">
    </form>

@endsection

