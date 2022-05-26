@extends('admin.admin')

@section('content')
    <form action="{{ route('childPage.update', $childPage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="route" placeholder="route" value="{{ $childPage->route }}"></label>
        <label><input type="text" name="title" placeholder="title" value="{{ $childPage->title }}"></label>
        <label><input type="text" name="description" placeholder="description" value="{{ $childPage->description }}"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection