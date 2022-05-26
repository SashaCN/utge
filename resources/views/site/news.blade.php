<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>news</title>
</head>
<body>
    @foreach ($news as $item)
        <div>
            <p>{{ $item->title }}</p>
            <p>{{ $item->description }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>