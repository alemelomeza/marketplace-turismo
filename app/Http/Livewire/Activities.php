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
        $this->showLess = false;
    }

    public function getMore()
    {
        $offset = count($this->activities);
        $result = Activity::offset($offset)->limit(self::VIEW)->get();

        $this->activities = $this->activities->merge($result);
        $this->total -= count($result);

    }

    public function getLess()
    {
        $this->activities = $this->activities->take(count($this->activities) - self::VIEW);
        $this->total += self::VIEW;
    }

    // computed property
    public function getShowLessProperty()
    {
        return count($this->activities) >= 6;
    }

    public function render()
    {
        return view('livewire.activities');
    }
}
