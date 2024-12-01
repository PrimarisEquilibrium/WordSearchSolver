@extends("components.layouts.layout")

@section("content")

<div>
    <h1>Word Search Solver</h1>
    <form action="{{ route("upload") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" required>
        <br><br>
        <label for="words">Input the words to find (seperated by commas)</label>
        <br>
        <textarea name="words" id="words" cols="30" rows="10"></textarea>
        <button type="submit" id="submit-btn">Submit</button>
    </form>
</div>

@endsection