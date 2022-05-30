@extends('admin.admin')

@section('content')
    <table>
        <tr>
            <th>Category title</th>
            <th>Sub Category belong to category</th>
        </tr>
        <tr>
            <td>{{$category->title}}</td>
            <td>
                @foreach ($subCategories as $subCategory)
                    <p>{{ $subCategory->title }}</p>
                @endforeach
            </td>
        </tr>
    </table>
    <h2>Products which belongs to category</h2>
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
            {{-- <td><img src="{{ asset($product->image->url) }}" alt="{{ $product->image->alt }}"></td> --}}
            <td><a href="{{ route('product.show', $product->id) }}">show</a></td>
        </tr>
        @endforeach
    </table>
@endsection
