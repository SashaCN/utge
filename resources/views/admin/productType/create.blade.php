@extends('admin.admin')

@section('content')
    <form action="{{ route('productType.store') }}" method="POST">
        @csrf
        <label><input type="text" name="uk">uk</label>
        <label><input type="text" name="ru">ru</label>
        <input type="submit" value="Send">
    </form>
@endsection
