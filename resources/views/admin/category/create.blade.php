@extends('admin.admin')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title" placeholder="category title"></label>
        <input type="submit" value="Send">
    </form>
@endsection