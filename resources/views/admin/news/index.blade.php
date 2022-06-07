@extends('admin.admin')

@section('content')

    <?php
        $locale = app()->getLocale();
    ?>

<a href="{{ route('news.create') }}">create</a>
<table>
    <tr>
        <th>img</th>
        <th>Title</th>
        <th>description</th>
        <th>action</th>
    </tr>
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
    </table>
@endsection