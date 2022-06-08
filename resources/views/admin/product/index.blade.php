@extends('admin.admin')
    @section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.product_list')</h2>
        <a href="{{ route('product.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>
    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.filters')</th>
                <th>@lang('admin.sizeprice')</th>
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
                <td>{{$product->subcategory->localization[0]->$locale}}</td>
                <td>
                    @foreach ($product->sizeprices as $sizeprice)
                        @if ($sizeprice->size != null)
                            <p>
                                {{ $sizeprice->size }}
                                /
                                {{ $sizeprice->price }}{{ $sizeprice->price_units }}
                                |
                                @if ($sizeprice->available == 1)
                                    @lang('admin.available')
                                @elseif ($sizeprice->available == 2)
                                    @lang('admin.not_available')
                                @elseif ($sizeprice->available == 3)
                                    @lang('admin.waiting_available')
                                @else
                                    @lang('admin.available_for_order')
                                @endif
                            </p>
                        @else
                            <p>
                                {{ $sizeprice->price }}грн
                                @if ($sizeprice->available == 1)
                                    @lang('admin.available')
                                @elseif ($sizeprice->available == 2)
                                    @lang('admin.not_available')
                                @elseif ($sizeprice->available == 3)
                                    @lang('admin.waiting_available')
                                @else
                                    @lang('admin.available_for_order')
                                @endif
                            </p>
                        @endif
                    @endforeach
                    {{-- {{dd($product->sizeprice)}} --}}
                </td>
                <td class="action">
                    <a href="{{ route('product.edit', $product->id) }}"></a>
                    <a href="{{ route('product.delete', $product->id) }}"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $products->withQueryString()->links('vendor.pagination.utge-pagination') }}
    </div>

    @endsection
