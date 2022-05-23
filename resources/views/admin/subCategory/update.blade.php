@extends('admin.admin')

@section('content')
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" value="{{ $category->title }}" placeholder="category title"></label>
        <p>category belong to product type</p>

        @foreach ($categories as $category)
            @if ($category->id == $subCategory->category_id)
                <label><input type="radio" name="product_type_id" value="{{ $category->id }}" checked>{{ $category->title }}</label>
            @else
                <label><input type="radio" name="product_type_id" value="{{ $category->id }}">{{ $category->title }}</label>
            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection