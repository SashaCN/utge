@extends('admin.admin')

@section('content')
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" value="{{ $category->title }}" placeholder="category title"></label>
        <p>category belong to product type</p>

        @foreach ($productTypes as $productType)
            @if ($productType->id == $category->product_type_id)
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}" checked>{{ $productType->title }}</label>
            @else
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->title }}</label>
            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection