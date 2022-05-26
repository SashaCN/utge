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
        <label><input type="text" name="title" placeholder="title"></label>
        <label><input type="text" name="description" placeholder="description"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection
