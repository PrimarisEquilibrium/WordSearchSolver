<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageInput extends Component
{   
    use WithFileUploads;

    public $image;

    public function render()
    {
        return view('livewire.image-input');
    }
}
