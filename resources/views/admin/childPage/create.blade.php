@extends('admin.admin')

@section('content')
    <form action="{{ route('childPage.store') }}" method="POST">
        @csrf
        <label><input type="text" name="rout" placeholder="rout"></label>
        <label><input type="text" name="title" placeholder="title"></label>
        <label><input type="text" name="description" placeholder="description"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection
