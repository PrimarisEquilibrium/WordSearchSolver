<div>
    <style>
        .row-container {
            margin-bottom: 1rem;
        }

        .row {
            line-height: 24px;
            font-size: 18px;
            font-family: "Courier New", Courier, monospace;
            display: block;
        }

        .word-container {
            margin-bottom: 2.5rem;
        }

        .word {
            display: block;
            width: fit-content;
            height: fit-content;
            margin-bottom: 0.25rem;
            cursor: pointer;
        }

        button {
            margin-top: 1.5rem;
        }

        .letter.highlight {
            color: red;
        }
    </style>
    
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
    <h2>Words (Click to reveal): </h2>
    <div class="word-container">
        @foreach ($word_array as &$word)
            <span 
                class="word"
                style="{{ $word == $active_word ? 'color: gray;' : '' }}"
                wire:click="modifyActiveWord('{{ $word }}')">{{ $word }}
            </span>
        @endforeach
    </div>
    <button onclick="window.location.href='{{ route('home') }}'">Return Home</button>
</div>