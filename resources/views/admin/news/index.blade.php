@extends('admin.admin')

@section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.news')</h2>
        <a href="{{ route('news.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>
    
    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.description')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                @php
                    $title = $item->localization[0];
                    $description = $item->localization[1];
                @endphp
                <tr>
                    <td class="product-image"><img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></td>
                    <td>{{ $title->$locale }}</td>
                    <td>{{ $description->$locale }}</td>
                    <td>
                        <a href="{{ route('news') }}">show</a>
                        <a href="{{ route('news.edit', $item->id) }}">update</a>
                        <form  action="{{ route('news.destroy', $item->id) }}" method="POST">
                            <label>
                                @csrf 
                                @method('DELETE')
                                <input type="submit" value="delete">
                            </label>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection