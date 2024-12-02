<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite("resources/css/app.css")
    @vite('resources/css/process.css')
    <title>Word Search Solver</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>