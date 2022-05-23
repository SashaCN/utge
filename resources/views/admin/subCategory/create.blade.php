@extends('admin.admin')

@section('content')
    <form action="{{ route('subCategory.store') }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" placeholder="sub category title"></label>
        <p>sub category belong to category</p>

        @foreach ($categories as $category)
            <label><input type="radio" name="category_id" value="{{ $category->id }}">{{ $category->title }}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection