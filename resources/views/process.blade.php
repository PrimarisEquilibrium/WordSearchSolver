<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/process.css')
    <title>Processing Word Search</title>
</head>
<body>
    <h1>Word Search</h1>
    @foreach ($rows as &$row)
        <span class="row">{{ $row }}</span>
        <br>
    @endforeach
    <h2>Words: </h2>
    @foreach ($wordArray as &$word)
        <span class="word">{{ $word }}</span>
        <br>
    @endforeach
</body>
</html>