<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test123 extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function resetCount()
    {
        $this->count = 0;
    }

    public function render()
    {
        return view('livewire.test123');
    }
}
