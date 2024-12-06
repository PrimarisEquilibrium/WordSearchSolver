<?php

namespace App\Livewire;

use Livewire\Component;

class ErrorAlert extends Component
{
    public $error;
    public $show_component = true;

    /**
     * Destroys the component when called.
     */
    public function removeComponent() {
        $this->show_component = false;
    }

    public function render()
    {
        return view('livewire.error-alert');
    }
}
