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

    <h3>slider</h3>
    <div>
        <div>slider 1</div>
        <div>slider 2</div>
        <div>slider 3</div>
        <div>slider 4</div>
    </div>

    <div style="padding: 10px 0"><hr></div>

    <h3>header</h3>
    <div class="header-modulus">
        <div>
            <p>@lang('admin.phone')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'phone')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp
                            
                            <tr>
                                <td>{{ $title->$locale }}</td>
        
                                <td>    
                                    <a href="{{ route('index') }}">show</a>
        
                                    <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                        <label>
                                            @csrf 
                                            @method('DELETE')
                                            <input type="submit" value="delete">
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p>@lang('admin.logo-img')</p>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'logo-img')
                        
                        <tr>
                            <td><img src="{{ $childPage->getFirstMediaUrl('images') }}" alt="{{ $title->$locale }}"></td>
                            <td>    
                                <a href="{{ route('index') }}">show</a>
    
                                <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                    <label>
                                        @csrf 
                                        @method('DELETE')
                                        <input type="submit" value="delete">
                                    </label>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        </div>
        <div>
            <p>@lang('admin.logo-name')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'logo-name')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp
                            
                            <tr>
                                <td>{{ $title->$locale }}</td>
        
                                <td>    
                                    <a href="{{ route('index') }}">show</a>
        
                                    <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                        <label>
                                            @csrf 
                                            @method('DELETE')
                                            <input type="submit" value="delete">
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div style="padding: 10px 0"><hr></div>

    <h3>footer</h3>
    <div class="footer-modulus">
        <div>
            <p>@lang('admin.phone')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'phone')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp
                            
                            <tr>
                                <td>{{ $title->$locale }}</td>
        
                                <td>    
                                    <a href="{{ route('index') }}">show</a>
        
                                    <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                        <label>
                                            @csrf 
                                            @method('DELETE')
                                            <input type="submit" value="delete">
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p>@lang('admin.footer-place')</p>
        <table class="product-table">
            <thead>
                <tr>
                    <th>@lang('admin.title')</th>
                    <th>@lang('admin.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($childPages as $childPage)
                    @if ($childPage->route == 'footer-place')
                        @php
                                $title = $childPage->localization[0];
                        @endphp
                        
                        <tr>
                            <td>{{ $title->$locale }}</td>
    
                            <td>    
                                <a href="{{ route('index') }}">show</a>
    
                                <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                    <label>
                                        @csrf 
                                        @method('DELETE')
                                        <input type="submit" value="delete">
                                    </label>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        </div>
        <div>
            <p>@lang('admin.email')</p>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>@lang('admin.title')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($childPages as $childPage)
                        @if ($childPage->route == 'email')
                            @php
                                    $title = $childPage->localization[0];
                            @endphp
                            
                            <tr>
                                <td>{{ $title->$locale }}</td>
        
                                <td>    
                                    <a href="{{ route('index') }}">show</a>
        
                                    <form  action="{{ route('childPage.destroy', $childPage->id) }}" method="POST">
                                        <label>
                                            @csrf 
                                            @method('DELETE')
                                            <input type="submit" value="delete">
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="padding: 20px 0"><hr></div>

    <h3>others</h3>
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
                @if ($childPage->route != 'logo-img' && $childPage->route != 'logo-name' && $childPage->route != 'phone' && $childPage->route != 'footer-place' && $childPage->route != 'email')
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
                            @if ($childPage->route == 'delivery' || $childPage->route == 'payment')
                            <a href="{{ route('deliveriesAndPayments') }}">show</a>
                            @endif
        
                            @if ($childPage->route == 'contacts')
                                <a href="{{ route('contacts') }}">show</a>
                            @endif

                            @if ($childPage->route == 'about_us')
                                <a href="{{ route('index') }}">show</a>
                            @endif

                            <a href="{{ route('childPage.edit', $childPage->id) }}">update</a>

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
                @endif
            @endforeach
        </tbody>
    </table>
@endsection