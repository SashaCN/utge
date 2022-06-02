@extends('admin.admin')

@section('content')

    <form action="{{ route('productType.store') }}" method="POST">

        @csrf

        <label><input type="text" name="title_uk">uk</label>
        <label><input type="text" name="title_ru">ru</label>
        <input type="submit" value="Send">

    </form>

@endsection
