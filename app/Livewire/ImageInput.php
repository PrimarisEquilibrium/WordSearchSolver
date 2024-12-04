<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageInput extends Component
{   
    use WithFileUploads;

    public $image;

    protected $rules = [
        "image" => "required|image|max:2048"
    ];

    public function render()
    {
        return view('livewire.image-input');
    }
}
