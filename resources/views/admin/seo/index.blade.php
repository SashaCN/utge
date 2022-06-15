@extends('admin.admin')
    @section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.seo_panel')</h2>
    </div>
    
@endsection
