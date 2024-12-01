<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body>
    <h1>Word Search Solver</h1>
    <form action="{{ route("upload") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" required>
        <br><br>
        <label for="words">Input the words to find (seperated by commas)</label>
        <br>
        <textarea name="words" id="words" cols="30" rows="10"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>