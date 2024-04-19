<?php

namespace Akhmads\Hyco\Livewire;

use Livewire\Component;

class Hello extends Component
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

    public function render()
    {
        return view('hyco::livewire.hello');
    }
}
