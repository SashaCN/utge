@extends('admin.admin')
    @section('content')
    <table>
        <a href="{{ route('product.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Article</th>
            <th>Category</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->article}}</td>
            <td>
                <ul>
                    @foreach ($product->categories as $category)
                        <li>{{ $category->title }}</li>
                    @endforeach
                </ul>
            </td>
            <td><a href="{{ route('product.show', $product->id) }}">show</a></td>
            <td><a href="{{ route('product.edit', $product->id) }}">edit</a></td>
            <td><a href="{{ route('product.delete', $product->id) }}">delete</a></td>
            <td><img src="{{ asset($product->image->url) }}" alt="{{ $product->image->alt }}"></td>
        </tr>
        @endforeach
    </table>
    @endsection
