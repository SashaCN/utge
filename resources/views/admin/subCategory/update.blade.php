@extends('admin.admin')

@section('content')
    <form action="{{ route('subCategory.update', $subCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" value="{{ $subCategory->title }}" placeholder="subCategory title"></label>
        <p>subCategory belong to category</p>

        @foreach ($categories as $category)
            @if ($category->id == $subCategory->category_id)
                <label><input type="radio" name="category_id" value="{{ $category->id }}" checked>{{ $category->title }}</label>
            @else
                <label><input type="radio" name="category_id" value="{{ $category->id }}">{{ $category->title }}</label>
            @endif
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection