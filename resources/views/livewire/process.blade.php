<div>
    <h1>Word Search</h1>
    <div class="row-container">
        @foreach ($rows as &$row)
            <span class="row">
                @for ($i = 0; $i < strlen($row); $i++)
                    <span class="letter">{{$row[$i]}}</span>
                @endfor
            </span>
        @endforeach
    </div>
    <h2>Words: </h2>
    @foreach ($word_array as &$word)
        <span class="word">{{ $word }}</span>
    @endforeach
    <button onclick="window.location.href='{{ route('home') }}'">Return Home</button>
</div>