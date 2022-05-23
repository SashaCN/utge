@extends('admin.admin')

@section('content')
    <form action="{{ route('productType.update', $productType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" value="{{ $productType->title }}" placeholder="productType title"></label>
        <input type="submit" value="Send">
    </form>
@endsection