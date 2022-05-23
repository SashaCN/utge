@extends('admin.admin')

@section('content')
    <table>
        <a href="{{ route('category.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td>
                <a href="{{ route('category.show', $category->id) }}">show</a>
                <a href="{{ route('category.edit', $category->id) }}">update</a>
                <a href="{{ route('category.delete', $category->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection