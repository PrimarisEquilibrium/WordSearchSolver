<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageInput extends Component
{   
    use WithFileUploads;

    public $image;

    protected $rules = [
        "image" => "required|image|mimes:jpg,png,jpeg|max:2048"
    ];

    /**
     * Resets the image state data
     */
    public function resetImage() : void {
        $this->reset("image");
    }

    public function render()
    {
        return view('livewire.image-input');
    }
}
