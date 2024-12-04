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

    public $edit_mode = false;
    public $temp_rows;

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

        $this->temp_rows = implode(", \n", $this->rows);
    }  

    /**
     * Updates the current active word.
     * @param string $new_word The new word.
     */
    public function modifyActiveWord(string $new_word) : void {
        $this->active_word = $new_word;

        // Update the highlighted tiles based on the updated word
        $this->highlighted_tiles = WordSearchSolverService::findWord($this->active_word, $this->rows);
    }

    public function updateBoard() {
        $this->rows = preg_split('/\s+/', $this->temp_rows);
        $this->toggleEditMode();
    }

    public function toggleEditMode()
    {
        $this->edit_mode = !$this->edit_mode;
    }
 
    public function render() {
        return view('livewire.process');
    }
}
