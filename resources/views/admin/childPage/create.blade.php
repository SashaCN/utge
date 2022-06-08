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
            <select name="route" id="child-page-select">
                <option value="" id="child-page-first-option" selected>@lang('admin.child_page_father')</option>
                <option value="delivery">@lang('utge.delivery')</option>
                <option value="payment">@lang('utge.payment')</option>
                <option value="contacts">@lang('utge.contacts')</option>
            </select>
        </label>

        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk"></label>

        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru"></label>
        <label><input type="text" name="description_ru" placeholder="description_ru"></label>
        
        <label><input type="hidden" name="image" value=""></label>
        <label><input type="file" name="image"></label>
        <label><input type="submit" value="Send"></label>
    </form>

    <script src="{{ asset('js/childPage.js') }}"></script>
@endsection
