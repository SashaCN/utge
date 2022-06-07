@extends('admin.admin')

@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('childPage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label>
            <select name="route">
                <option value="delivery">delivery</option>
                <option value="contacts">contacts</option>
            </select>
        </label>

        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk"></label>

        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru"></label>
        <label><input type="text" name="description_ru" placeholder="description_ru"></label>
        
        <label><input type="file" name="image"></label>
        <label><input type="submit" value="Send"></label>
    </form>
@endsection
