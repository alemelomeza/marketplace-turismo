<?php

namespace App\Http\Livewire;

use App\Activity;
use Livewire\Component;
use PhpParser\Node\Stmt\Const_;

class Activities extends Component
{
    const VIEW = 3;

    public $activities;
    public $total;

    public function mount()
    {
        $this->activities = Activity::limit(self::VIEW)->get();
        $this->total = Activity::count() - self::VIEW;
    }

    public function getMore()
    {
        $offset = count($this->activities);
        $result = Activity::offset($offset)->limit(self::VIEW)->get();

        $this->activities = $this->activities->merge($result);
        $this->total -= count($result);

    }

    public function render()
    {
        return view('livewire.activities');
    }
}
