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
                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                    @csrf   
                    @method('DELETE')
                    <input type="submit" value="delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection