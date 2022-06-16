@extends('admin.admin')
    @section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    {{-- <div class="flex title-line">
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
            </tr>


        </tbody> --}}
    </table>
    <div class="to-dev">
        <div class="dev-wrap">
            <img class="to-dev-img" src="{{ asset('img/to_develop.svg') }}" alt="">
            <p class="to-dev-desc">under development</p>
        </div>
    </div>
@endsection
