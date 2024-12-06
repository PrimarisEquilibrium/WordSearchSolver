@extends("components.layouts.layout")

@section("content")

<div class="prose w-max h-max">
    <div class="mb-8 fixed">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @livewire('error-alert', ['error' => $error])
            @endforeach
        @endif
    </div>

    <div class="mb-8">
        <h1>Word Search Solver</h1>
        <ul class="-mt-4">
            <li>The word search image size must be less than 2MB.</li>
            <li>Supported image formats: jpg, png, jpeg.</li>
            <li>Note the image reader is not 100% accurate.</li>
            <li>Ensure your image is atleast 300DPI and font is clear to read.</li>
        </ul>
    </div>
    <form action="{{ route("upload") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-8">
            @livewire("image-input")
        </div>
        <div class="mb-4">
            <label for="words">
                <strong>Input the words to find</strong> (seperated by commas)
            </label>
        </div>
        <textarea
            placeholder="Enter words here..."
            class="mb-2 textarea textarea-bordered textarea-md w-full max-w-xs"
            name="words"
            id="words"
            rows="5"></textarea>
        <button type="submit" id="submit-btn" class="btn btn-neutral btn-wide">Submit</button>
    </form>
</div>

@endsection