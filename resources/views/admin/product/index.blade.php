@extends('admin.admin')
    @section('content')
    <table>
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
        </tr>
        @endforeach
    </table>

    @endsection

