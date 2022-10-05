<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 0;
    public $name = "";

    public function increment(){
        $this->count++;
    }

    public function mount()
    {
        $this->name = "mount";
    }

    public function updated()
    {
        $this->name = "updated";
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
