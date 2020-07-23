<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Features extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.features');
    }
}
