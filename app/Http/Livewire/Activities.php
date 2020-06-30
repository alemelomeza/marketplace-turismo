<?php

namespace App\Http\Livewire;

use App\Activity;
use Livewire\Component;

class Activities extends Component
{
    public $activities;

    public function mount()
    {
        $this->activities = Activity::limit(3)->get();
    }

    public function getMore()
    {
        collect($this->activities)->join(Activity::offset(count($this->activities))->limit(3)->get());
    }

    public function render()
    {
        return view('livewire.activities');
    }
}
