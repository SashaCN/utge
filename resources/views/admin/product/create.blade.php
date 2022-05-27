@extends('admin.admin')
@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Назва<input type="text" name="title_uk"></label>
        <label>Назва<input type="text" name="title_ru"></label>


        @error('title')
            <p>{{$message}}</p>
        @enderror

        <label>Артикул<input type="text" name="article"></label>

        @error('article')
            <p>{{$message}}</p>
        @enderror

        <p>Доступність товару</p>
        <select name="available">
            <option value="1">В наявності</option>
            <option value="2">Очікується</option>
            <option value="3">Немає в наявності</option>
        </select>

        <p>Доставка товару</p>
        <select name="shipable">
            <option value="1">Доступна доставка</option>
            <option value="2">Немає доставки</option>
        </select>

        <label>Ціна<input type="number" name="price"></label>

        @error('price')
            <p>{{$message}}</p>
        @enderror

        <label>Виберіть категорію
            @foreach ($categories as $category)
                <input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->title }}
            @endforeach
        </label>

        @error('category')
            <p>{{$message}}</p>
        @enderror

        <label>Максимальна кількість замовлення<input type="number" name="max_order"></label>

        @error('max_order')
            <p>{{$message}}</p>
        @enderror

        <label>Позиція в списку<input type="number" name="list_position"></label>

        @error('list_position')
            <p>{{$message}}</p>
        @enderror

        <p>Опис товару</p>
        <textarea id="desc" name="description_uk" cols="30" rows="10"></textarea>
        <textarea id="desc" name="description_ru" cols="30" rows="10"></textarea>

        @error('description')
            <p>{{$message}}</p>
        @enderror

        @error('image')
        <p>{{$message}}</p>
        @enderror

        <label><input type="file" name="image"></label>

        <label><input type="text" name="alt"></label>
        <input type="submit" value="Send">
    </form>
@endsection
