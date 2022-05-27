@extends('admin.admin')

@section('content')
    <form action="{{ route('childPage.update', $childPage->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="route" placeholder="route" value="{{ $childPage->route }}"></label>
        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk"></label>
        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru">{{ $childPage->title}}</label>
        <label><input type="text" name="description_ru" placeholder="description_ru">{{ $childPage->description}}</label>

        <label><input type="submit" value="Send"></label>
    </form>
@endsection