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
                    
                    if ($childPage->route != 'phone')
                    {
                        $description = $childPage->localization[1];
                    }
                @endphp
                
                <tr>
                    <td class="product-image">
                        @if ($childPage->route != 'about_us' && $childPage->route != 'phone')
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
                        
                        @if ($childPage->route == 'phone')
                            <p>@lang('admin.phone')</p></>
                        @endif
                    </td>
                    <td @if ($childPage->route == 'phone') colspan="2"  style="text-align:center;" @endif>{{ $title->$locale }}</td>

                    @if ($childPage->route != 'phone')
                        <td>
                            {!! $description->$locale !!}
                        </td>
                    @endif
                    
                    <td>
                        @if ($childPage->route == 'delivery' || $childPage->route == 'payment')
                        <a href="{{ route('deliveriesAndPayments') }}">show</a>
                        @endif
    
                        @if ($childPage->route == 'contacts')
                            <a href="{{ route('contacts') }}">show</a>
                        @endif

                        @if ($childPage->route == 'about_us' || $childPage->route == 'phone')
                            <a href="{{ route('index') }}">show</a>
                        @endif

                        @if ($childPage->route != 'phone')
                            <a href="{{ route('childPage.edit', $childPage->id) }}">update</a>
                        @endif

                        @if ($childPage->route != 'about_us')
                            <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                <label>
                                    @csrf 
                                    @method('DELETE')
                                    <input type="submit" value="delete">
                                </label>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection