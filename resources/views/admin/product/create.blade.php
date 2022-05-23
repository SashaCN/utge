@extends('admin.admin')
@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label><input type="text" name="title">title</label>

        @error('title')
            <p>{{$message}}</p>
        @enderror

        <label><input type="text" name="article">article</label>

        @error('article')
            <p>{{$message}}</p>
        @enderror

        <select name="available">
            <option value="1">В наявності</option>
            <option value="2">Очікується</option>
            <option value="3">Немає в наявності</option>
        </select>
        
        <select name="shipable">
            <option value="1">Доступна доставка</option>
            <option value="2">Немає доставки</option>
        </select>

        <label><input type="number" name="price"></label>

        @foreach ($categories as $category)
            <label><input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->title }}</label>
        @endforeach

        <label><input type="number" name="max_order"></label>
        <label><input type="number" name="list_position"></label>

        <textarea name="description" cols="30" rows="10"></textarea>

        <label><input type="file" name="image"></label>

        <label><input type="text" name="alt"></label>
        <input type="submit" value="Send">
    </form>
@endsection
