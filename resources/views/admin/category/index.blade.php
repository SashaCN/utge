@extends('admin.admin')

@section('content')
    <table>
        <a href="{{ route('productType.create') }}">Create Product type</a>
        <tr>
            <th>Product type</th>
            <th>action</th>
        </tr>
        @foreach ($productTypes as $productType)
        <tr>
            <td>{{$productType->title}}</td>
            <td>
                <a href="{{ route('productType.edit', $productType->id) }}">update</a>
                <a href="{{ route('productType.delete', $productType->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <hr>
    <table>
        <a href="{{ route('category.create') }}">Create category</a>
        <tr>
            <th>category</th>
            <th>action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}">update</a>
                <a href="{{ route('category.delete', $category->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <hr>
    <table>
        <a href="{{ route('subCategory.create') }}">Create sub category</a>
        <tr>
            <th>Title</th>
            <th>action</th>
        </tr>
        @foreach ($subCategories as $subCategory)
        <tr>
            <td>{{$subCategory->title}}</td>
            <td>
                <a href="{{ route('subCategory.edit', $subCategory->id) }}">update</a>
                <a href="{{ route('subCategory.delete', $subCategory->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection