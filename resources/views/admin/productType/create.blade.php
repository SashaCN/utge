@extends('admin.admin')

@section('content')
    <form action="{{ route('productType.store') }}" method="POST">
        @csrf
        <label><input type="text" name="title" placeholder="productType title"></label>
        <input type="submit" value="Send">
    </form>
@endsection 