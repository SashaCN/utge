@extends('admin.admin')

@section('content')

<?php

    if (app()->getLocale() == 'uk') {
        $title = 'title_uk';
        $description = 'description_uk';
    } elseif (app()->getLocale() == 'ru') {
        $title = 'title_ru';
        $description = 'description_ru';
    }

?>

<a href="{{ route('news.create') }}">create</a>
    <table>
        <tr>
            <th>Title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        @foreach ($news as $item)
        <tr>
            <td>{{$item->localization[0]->$title}}</td>
            <td>{{$item->localization[0]->$description}}</td>
            <td>
                <a href="{{ route('news') }}">show</a>
                <a href="{{ route('news.edit', $item->id) }}">update</a>
                <form  action="{{ route('news.destroy', $item->id) }}" method="POST">
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