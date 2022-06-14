@extends('admin.admin')

@section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="flex title-line">
        <h2>@lang('admin.trash_box')</h2>
    </div>

    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            @php
                $title = $product->localization[0];
                $description = $product->localization[1];
            @endphp
            <tr>
                <td class="product-image"><img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></td>
                <td>{{$title->$locale}}</td>

                <td class="restore">
                    <a href="{{ route('trashBox.restore', $product->id) }}"></a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
