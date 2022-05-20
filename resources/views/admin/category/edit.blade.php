@extends('admin.admin')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title" placeholder="category title"></label>
        <p>category belong to product type</p>

        @foreach ($productTypes as $productType)
            @if ()
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->title }}</label>
            @else
                <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->title }}</label>
            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection