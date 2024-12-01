<?php

namespace App\Livewire;

use App\Services\OcrReaderService;
use App\Services\WordSearchSolverService;
use Livewire\Component;

class Process extends Component
{
    public $word_array;
    public $rows;

    public $active_word = "";
    public $highlighted_tiles = [];

    public function mount(string $imagename, string $words) {
        // Decode the words array
        $wordArray = json_decode($words);
        $this->word_array = $wordArray;
        
        // Get the full image path
        $image_path = storage_path("app\\public\\images\\" . $imagename);

        // Take the image and convert it into a string array
        $raw_rows = OcrReaderService::toText($image_path);
        $rows = preg_split('/\s+/', $raw_rows);
        $this->rows = $rows;
    }  

    /**
     * Updates the current active word.
     * @param string $new_word The new word.
     */
    public function modifyActiveWord(string $new_word) : void {
        $this->active_word = $new_word;

        // Functions that need to be ran on the modification of active_word
        $this->highlightMatchedWord($new_word);
    }

    public function highlightMatchedWord(string $word) {
        $this->highlighted_tiles = WordSearchSolverService::findWord($word, $this->rows);
    }
 
    public function render() {
        return view('livewire.process');
    }
}
