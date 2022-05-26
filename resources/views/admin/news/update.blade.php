@extends('admin.admin')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label><input type="text" name="title" placeholder="title" value="{{ $news->title }}"></label>
        <label><input type="text" name="description" placeholder="description" value="{{ $news->description }}"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection