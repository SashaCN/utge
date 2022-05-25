@extends('admin.admin')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label><input type="text" name="uk" placeholder="category title"></label>
        <label><input type="text" name="ru" placeholder="category title"></label>
        <p>category belong to product type</p>

        @foreach ($productTypes as $productType)
            <label><input type="radio" name="product_type_id" value="{{ $productType->id }}">{{ $productType->localization[0]->uk }}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection
