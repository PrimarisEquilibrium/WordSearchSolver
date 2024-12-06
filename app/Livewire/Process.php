<?php

namespace App\Livewire;

use App\Services\OcrReaderService;
use App\Services\WordSearchSolverService;
use Livewire\Component;

class Process extends Component
{
    public $word_array;
    public $rows;
    public $input_word; // The currently typed word in the "word to add" input box

    public $active_word = ""; // The search word
    public $highlighted_tiles = []; // Coordinate pair of the searched word characters in the grid

    public $edit_mode = false;
    public $input_rows; // The new user modified word search array

    public function mount(string $imagename, string $words) {
        // Decode the words array
        $word_array = json_decode($words);
        $word_array = array_map("strtolower", $word_array);
        $this->word_array = $word_array;
        
        // Get the full image path
        $image_path = storage_path("app\\public\\images\\" . $imagename);

        // Take the image and convert it into a string array
        $raw_rows = OcrReaderService::toText($image_path);
        $rows = preg_split('/\s+/', $raw_rows);
        $this->rows = $rows;

        $this->input_rows = implode(", \n", $this->rows);
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

    /**
     * Replaces $rows with $input_rows.
     */
    public function updateBoard() : void {
        // $input_rows is in a string format, convert it into an array of string rows
        $this->rows = preg_split('/\s+/', $this->input_rows);
        $this->toggleEditMode();
    }

    /**
     * Toggles the $edit_mode boolean state.
     */
    public function toggleEditMode() : void
    {
        $this->edit_mode = !$this->edit_mode;
    }

    /**
     * Adds the typed word to the words to find array.
     * @note The word is only added if it's unique.
     */
    public function addWord() : void {
        $this->input_word = strtolower($this->input_word);
        if ($this->input_word && !in_array($this->input_word, $this->word_array)) {
            array_push($this->word_array, $this->input_word);
        }
        $this->input_word = "";
    }

    /**
     * Deletes the given word from the "words to find" array.
     * @param string $word The word to delete.
     */
    public function deleteWord(string $word) : void {
        $key = array_search($word, $this->word_array);
        if ($key !== false) {
            unset($this->word_array[$key]);
        }
    }
 
    public function render() {
        return view('livewire.process');
    }
}
