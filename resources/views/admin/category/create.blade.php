@extends('admin.admin')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title" placeholder="category title"></label>
       <p>Sub Category</p>
        @foreach ($subCategories as $subCategory)
            <label><input type="checkbox" name="subCategories[]" value="{{ $subCategory->id }}">{{ $subCategory->title }}</label>
        @endforeach

        <input type="submit" value="Send">
    </form>
@endsection