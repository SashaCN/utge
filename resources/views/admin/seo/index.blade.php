@extends('admin.admin')
    @section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.seo_panel')</h2>
    </div>

    <table class="product-table">
        <thead>
            <tr>

                <th>@lang('admin.title')</th>

                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- @foreach ($uris as $uri)

                <td>
                    {{$uri->uri}}
                </td>

                <td class="action">
                    <a href="#"></a>
                    <a href="#}"></a>
                </td>

                @endforeach --}}
            </tr>


        </tbody>
    </table>

@endsection
