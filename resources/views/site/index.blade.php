<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @foreach ($childPages as $childPage) --}}
    <p>
        <a href="{{ route('child', 'price') }}">price</a>
    </p>
    <p>
        <a href="{{ route('child', 'phone') }}">phone</a>
    </p>
    <p>
        <a href="{{ route('news') }}">news</a>
    </p>
    {{-- @endforeach --}}
    <p>index utge</p>
</body>
</html>