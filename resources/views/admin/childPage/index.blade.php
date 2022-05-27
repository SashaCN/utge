@extends('admin.admin')

@section('content')
<a href="{{ route('childPage.create') }}">create</a>
    <table>
        <tr>
            <th>route</th>
            <th>Title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        @foreach ($childPages as $childPage)
        <tr>
            {{dd($childPage)}}
            <td>{{$childPage->route}}</td>
            <td>{{$childPage->localization[0]->$title}}</td>
            <td>{{$childPage->localization[0]->$description}}</td>
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