@extends('admin.admin')

@section('content')
    <table>
        <tr>
            <th>Category</th>
            <th>Sub Category</th>
        </tr>
        <tr>
            <td>{{$category->title}}</td>
            <td>
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
                        <td><a href="{{ route('product.show', $product->id) }}">show</a></td>
                        <td><img src="{{ asset($product->image->url) }}" alt="{{ $product->image->alt }}"></td>
                    </tr>
                    @endforeach
            </td>
        </tr>
    </table>
@endsection