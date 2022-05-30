<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChildPage</title>
</head>
<body>
    <p>child page</p>
    @foreach ($childPage as $item)
        <div>
            <h3>{{ $item->title }}</h2>
            <p>{{ $item->description }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>