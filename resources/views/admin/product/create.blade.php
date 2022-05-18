@extends('admin.admin')
@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label><input type="text" name="title">title</label>
        <label><input type="text" name="article">article</label>

        <label><input type="radio" checked value="1" name="shipable"><input type="radio" value="0" name="shipable">shipable</label>
        <label><input type="radio" checked value="1" name="available"><input type="radio" value="0" name="available">available</label>

        @foreach ($categories as $category)
            <label><input type="checkbox" name="catecory">{{ $category->title }}</label>
        @endforeach

        <label><input type="number" name="max_order"></label>
        <label><input type="number" name="list_position"></label>

        <textarea name="description" cols="30" rows="10"></textarea>

        <label><input type="file" name="image"></label>
        <label><input type="text" name="alt"></label>
        <input type="submit" value="Send">
    </form>
@endsection
