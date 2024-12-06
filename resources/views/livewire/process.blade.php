<div class="prose">
    <div class="mb-8 fixed">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @livewire('error-alert', ['error' => $error])
            @endforeach
        @endif
    </div>

    <h1>Find Words</h1>
    
    <div class="mb-4">
        @if (!$edit_mode)
            <div class="row-container font-mono	block">
                @foreach ($rows as $r=>&$row)
                    <span class="row block leading-6">
                        @for ($c = 0; $c < strlen($row); $c++)
                            <span class="letter {{ in_array([$r, $c], $highlighted_tiles) ? 'text-red-400' : '' }} mr-1">{{$row[$c]}}</span>
                        @endfor
                    </span>
                @endforeach
            </div>
        @else
            <textarea
                name="new-board" 
                id="new-board"
                class="textarea textarea-bordered textarea-md w-full max-w-xs font-mono tracking-widest"
                cols="{{ strlen($rows[0]) * 1.5 }}" 
                rows="{{ count($rows) }}"
                wire:model="input_rows"
            >{{ implode("\n", $rows) }}</textarea>
        @endif
    </div>

    <button class="btn btn-outline btn-primary" wire:click="toggleEditMode">
        @if (!$edit_mode)
            Modify Board
        @else
            Confirm New Board
        @endif
    </button>

    <h2>Words (Click to reveal): </h2>
    <div class="join mb-4">
        <input
            type="text"
            placeholder="Word to add..."
            wire:model="input_word"
            class="input input-bordered w-full max-w-xs join-item" />
        <button class="btn btn-outline join-item" wire:click="addWord('e')">Add Word</button>
    </div>
    <div class="word-container mb-8">
        @foreach ($word_array as &$word)
            <div>
                <button class="btn btn-outline" wire:click="deleteWord('{{ $word }}')">X</button>
                <button class="btn {{ $word == $active_word ? 'btn-neutral' : '' }}" wire:click="modifyActiveWord('{{ $word }}')">
                    <span 
                        class="word text-lg cursor-pointer">
                        {{ $word }}
                    </span>
                </button>
            </div>
        @endforeach
    </div>

    <button class="btn btn-neutral btn-wide" onclick="window.location.href='{{ route('home') }}'">Return Home</button>
</div>