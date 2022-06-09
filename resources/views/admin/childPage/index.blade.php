@extends('admin.admin')

@section('content')

<?php
    $locale = app()->getLocale();
?>


<a href="{{ route('childPage.create') }}">create</a>
    <table>
        <tr>
            <th>img</th>
            <th>route</th>
            <th>Title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        @foreach ($childPages as $childPage)
        @php
            $title = $childPage->localization[0];
            $description = $childPage->localization[1];
        @endphp
        <tr>
            <td class="product-image"><img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></td>
            <td>{{ $childPage->route }}</td>
            <td>{{ $title->$locale }}</td>
            <td>{{ $description->$locale }}</td>
            <td>
                <a href="{{ route('child', $childPage->route) }}">show</a>
                <a href="{{ route('childPage.edit', $childPage->id) }}">update</a>
                <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                    <label>
                        @csrf 
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </label>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection