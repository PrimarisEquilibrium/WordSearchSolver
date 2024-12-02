<?php

namespace App\Livewire;

use App\Services\OcrReaderService;
use Livewire\Component;

class Process extends Component
{
    public $wordArray;
    public $rows;

    public function mount(string $imagename, string $words) {
        // Decode the words array
        $wordArray = json_decode($words);
        $this->wordArray = $wordArray;
        
        // Get the full image path
        $imagePath = storage_path("app\\public\\images\\" . $imagename);

        // Take the image and convert it into a string array
        $raw_rows = OcrReaderService::toText($imagePath);
        $rows = preg_split('/\s+/', $raw_rows);
        $this->rows = $rows;
    }
 
    public function render()
    {
        return view('livewire.process');
    }
}
