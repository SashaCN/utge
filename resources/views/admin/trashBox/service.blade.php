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
        <h2>@lang('admin.service_trash_box')</h2>
    </div>

    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.service_sizeprice')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            @php
                $title = $service->localization[0];
                // $description = $service->localization[1];
            @endphp
            <tr>
                <td>{{$title->$locale}}</td>
                <td>
                    @foreach ($service->servicessizeprice as $sizeprice)
                        @php
                            if ($locale == 'uk') {
                                $price = $sizeprice->price;
                            } else {
                                if ($sizeprice->price_ru != null) {
                                    $price = $sizeprice->price_ru;
                                } else {
                                    $price = $sizeprice->price;
                                }   
                            }
                        @endphp
                        @if ($sizeprice->materials != null)
                            <p>
                                {{ $sizeprice->materials }}
                                /
                                {{ $price }}
                            </p>
                        @else
                            <p>
                                {{ $price }}

                            </p>
                        @endif
                    @endforeach
                </td>

                <td class="restore">
                    <a title="Відновити" href="{{ route('servicesTrash.serviceRestore', $service->id) }}"></a>
                    <a title="Видалити назавжди" href="{{ route('servicesTrash.servicesForceDelete', $service->id) }}"></a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    <script src="{{ asset('js/create.js') }}"></script>
@endsection
