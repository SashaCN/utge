@extends('admin.admin')
    @section('content')
    <table>
        <a href="{{ route('admin.create') }}"></a>
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
            <td><img src="{{ asset($product->image->url) }}" alt=""></td>
        </tr>
        @endforeach
    </table>

    @endsection

