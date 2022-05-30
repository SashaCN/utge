@extends('admin.admin')

@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk"></label>
        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru"></label>
        <label><input type="text" name="description_ru" placeholder="description_ru"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection
