@extends('admin.admin')

@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('childPage.store') }}" method="POST">
        @csrf
        <label>
            <select name="route">
                <option value="price">price</option>
                <option value="phone">phone</option>
            </select>
        </label>
        <label><input type="text" name="title" placeholder="title"></label>
        <label><input type="text" name="description" placeholder="description"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection
