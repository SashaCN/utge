@extends('admin.admin')
@section('content')
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label><input type="text" name="title"></label>
        <label><input type="text" name="article"></label>
        <label><input type="number" name="shipable"></label>
        <label><input type="number" name="available"></label>
        <label><input type="number" name="max_order"></label>
        <label><input type="number" name="list_position"></label>
        <textarea name="description" cols="30" rows="10"></textarea>
        <input type="submit" value="Send">
    </form>
@endsection
