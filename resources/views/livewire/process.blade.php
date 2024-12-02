<div>
    <h1>Word Search</h1>
    <div class="row-container">
        @foreach ($rows as $r=>&$row)
            <span class="row">
                @for ($c = 0; $c < strlen($row); $c++)
                    <span class="letter {{ in_array([$r, $c], $highlighted_tiles) ? 'highlight' : '' }}">{{$row[$c]}}</span>
                @endfor
            </span>
        @endforeach
    </div>
    <h2>Words: </h2>
    @foreach ($word_array as &$word)
        <span class="word" wire:click="modifyActiveWord('{{ $word }}')">{{ $word }}</span>
    @endforeach
    <button onclick="window.location.href='{{ route('home') }}'">Return Home</button>
</div>