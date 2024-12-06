@extends("components.layouts.layout")

@section("content")

<div>
    <h1>Word Search Solver</h1>
    <ul>
        <li>The word search image size must be less than 2MB.</li>
        <li>Supported image formats: jpg, png, jpeg.</li>
        <li>Note the image reader is not 100% accurate.</li>
        <li>Ensure your image is atleast 300DPI and font is clear to read.</li>
    </ul>
    <form action="{{ route("upload") }}" method="POST" enctype="multipart/form-data">
        @csrf
        @livewire("image-input")
        <br>
        <label for="words">Input the words to find (seperated by commas)</label>
        <br>
        <textarea name="words" id="words" cols="30" rows="10" required></textarea>
        <button type="submit" id="submit-btn">Submit</button>
    </form>
    <button class="btn w-64 rounded-full">Button</button>
</div>

@endsection