@extends('admin.admin')

@section('content')
    @php
        $locale = app()->getLocale();
    @endphp

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('childPage.update', $childPage->id) }}" method="POST">
        @csrf
        @method('PUT')

        @php
            $title = $childPage->localization[0];
            $description = $childPage->localization[1];
        @endphp

        <label><input type="text" name="route" placeholder="route" value="{{ $childPage->route }}"></label>
       
        <p>uk</p>
        <label><input type="text" name="title_uk" placeholder="title_uk" value="{{ $title->uk }}"></label>
        <label><input type="text" name="description_uk" placeholder="description_uk" value="{{ $description->uk }}"></label>
       
        <p>ru</p>
        <label><input type="text" name="title_ru" placeholder="title_ru" value="{{ $title->ru }}"></label>
        <label><input type="text" name="description_ru" placeholder="description_ru" value="{{ $description->ru }}"></label>

        <label><input type="submit" value="Send"></label>
    </form>

    <div class="image-slide flex-col">


        <label class="image-changes" for="image-changes"><img class="old-image" src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></label>
        <p class="image-changes-desc">@lang('childPage.update-image')</p>

        <button class="image-changes-bt" type="submit" form="image-change" class="add-button">@lang('admin.save-new-phot')</button>

    </div>

    <form id="image-change" class="image-changes-form" action="{{ route('childPage.mediaUpdate', $childPage->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <input id="image-changes" type="file" name="image">
        <input type="submit" value="img">
    </form>

@endsection