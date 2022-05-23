@extends('admin.admin')

@section('content')
    <table>
        <a href="{{ route('productType.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>action</th>
        </tr>
        @foreach ($productTypes as $productType)
        <tr>
            <td>{{$productType->title}}</td>
            <td>
                <a href="{{ route('productType.show', $productType->id) }}">show</a>
                <a href="{{ route('productType.edit', $productType->id) }}">update</a>
                <a href="{{ route('productType.delete', $productType->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection