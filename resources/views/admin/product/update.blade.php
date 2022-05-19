@extends('admin.admin')
@section('content')
    <form action="{{ route('product.store', $product->id ) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('POST')

        <label><input type="text" value="{{ $product->title }}" name="title">title</label>
        <label><input type="text" value="{{ $product->article }}" name="article">article</label>

        @if ( $product->shipable == 1 )
            <label>
                <input type="radio" checked value="1" name="shipable">
                <input type="radio" value="0" name="shipable">
                shipable
            </label>
        @else
            <label>
                <input type="radio" value="1" name="shipable">
                <input type="radio" checked value="0" name="shipable">
                shipable
            </label>
        @endif

        @if ( $product->available == 1 )
            <label>
                <input type="radio" checked value="1" name="available">
                <input type="radio" value="0" name="available">
                available
            </label>
        @else
            <label>
                <input type="radio" value="1" name="available">
                <input type="radio" checked value="0" name="available">
                available
            </label>
        @endif

        @foreach ($categories as $category)

            @foreach ($selected_categories as $selected_category)

                @if ( $category->id != $selected_category->id)
                    <label><input type="checkbox"  name="categories[]" value="{{ $category->id }}">{{ $category->title }}</label>

                @else
                    <label><input type="checkbox" checked name="categories[]" value="{{ $category->id }}">{{ $category->title }}</label>

                @endif

            @endforeach

        @endforeach

        <label><input type="number" value="{{ $product->max_order }}" name="max_order"></label>
        <label><input type="number" value="{{ $product->list_position }}" name="list_position"></label>

        <textarea name="description" cols="30" rows="10">{{ $product->description }}</textarea>

        <img src="{{ $product->image->url }}" alt="{{ $product->image->alt }}">
        <label><input type="file" name="image"></label>
        <label><input type="text" value="{{ $product->image->alt }}" name="alt"></label>
        <input type="submit" value="Send">
    </form>
@endsection

