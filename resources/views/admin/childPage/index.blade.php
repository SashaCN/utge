@extends('admin.admin')

@section('content')
<a href="{{ route('childPage.create') }}">create</a>
    <table>
        <tr>
            <th>Title</th>
            <th>description</th>
            <th>action</th>
        </tr>
        @foreach ($childPages as $childPage)
        <tr>
            <td>{{$childPage->title}}</td>
            <td>{{$childPage->description}}</td>
            <td>
                <a href="{{ route('childPage.edit', $childPage->id) }}">update</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection