@extends('admin.admin')
    @section('content')
    <table>
        <a href="{{ route('product.create') }}"></a>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Article</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->article}}</td>
            <td><img src="{{ url($product->image->url) }}" alt=""></td>
            <td><a href="{{ route ('product.show', $product->id) }}">Show</a></td>
        </tr>
        @endforeach
    </table>
    @endsection
