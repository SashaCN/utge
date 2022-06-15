@extends('admin.admin')

@section('content')

    <?php
        $locale = app()->getLocale();
    ?>

    <div class="flex title-line">
        <h2>@lang('admin.modules')</h2>
        <a href="{{ route('childPage.create') }}" class="add-button action-button">
            <img src="{{ asset('img/add.svg') }}" alt="Add">
        </a>
    </div>

    <table class="product-table">
        <thead>
            <tr>
                <th>@lang('admin.image')</th>
                <th>@lang('admin.route')</th>
                <th>@lang('admin.title')</th>
                <th>@lang('admin.description')</th>
                <th>@lang('admin.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($childPages as $childPage)
                @php
                    $title = $childPage->localization[0];
                    $description = $childPage->localization[1];
                @endphp
                
                <tr>
                    <td class="product-image">
                        @if ($childPage->route != 'about_us')
                            <img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}">
                        @endif
                    </td>
                    <td>
                        @if ($childPage->route == 'delivery')
                            <p>@lang('utge.delivery')</p>
                        @endif
    
                        @if ($childPage->route == 'payment')
                            <p>@lang('utge.payment')</p>
                        @endif
    
                        @if ($childPage->route == 'contacts')
                            <p>@lang('utge.contacts')</p>
                        @endif

                        @if ($childPage->route == 'about_us')
                            <p>@lang('utge.about-us')</p>
                        @endif
                    </td>
                    <td>{{ $title->$locale }}</td>
                    <td>{!! $description->$locale !!}</td>
                    <td>
                        <a href="{{ route('child', $childPage->route) }}">show</a>
                        <a href="{{ route('childPage.edit', $childPage->id) }}">update</a>
                        <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
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