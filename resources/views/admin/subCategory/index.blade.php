@extends('admin.admin')

@section('content')
    <table>
        <a href="{{ route('subCategory.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>action</th>
        </tr>
        @foreach ($subCategories as $subCategory)
        <tr>
            <td>{{$subCategory->title}}</td>
            <td>
                <a href="{{ route('subCategory.show', $subCategory->id) }}">show</a>
                <a href="{{ route('subCategory.edit', $subCategory->id) }}">update</a>
                <a href="{{ route('subCategory.delete', $subCategory->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection