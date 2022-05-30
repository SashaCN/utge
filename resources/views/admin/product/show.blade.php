@extends('admin.admin')
    @section('content')
<<<<<<< HEAD
        <h2>{{$product->localization[0]->title_ru}}</h2>

=======
        <div class="flex title-line">
            <h2>{{ $product->title }}</h2>
            <div class="button-box">
                <a href="{{ route('product.edit', $product->id) }}" class="action-button">
                    <img src="{{ asset('img/edit.svg') }}" alt="Edit">
                </a>
                <a href="{{ route('product.delete', $product->id) }}" class="action-button">
                    <img src="{{ asset('img/delete.svg') }}" alt="Delete">
                </a>
            </div>
        </div>
>>>>>>> 1ee676d35c3ca7767f665583043004cef8a6bff4
    @endsection
