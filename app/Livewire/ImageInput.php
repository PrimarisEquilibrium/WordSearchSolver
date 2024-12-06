<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageInput extends Component
{   
    use WithFileUploads;

    public $image;

    protected function rules() {
        return [
            "image" => "required|image|mimes:jpg,png,jpeg|max:2048",
        ];
    }

    /**
     * Validate when the $image is updated.
     * @note This prevents a file preview error when invalid file types are provided.
     */
    public function updated()
    {
        $this->validate();
    }

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
