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
                <form action="{{ route('productType.destroy', $productType->id) }}" method="post">
                    @csrf   
                    @method('DELETE')
                    <input type="submit" value="delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection