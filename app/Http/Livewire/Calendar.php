<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{

    public $currentDate;
    public $currentWeek;
    public $day;

    public function mount()
    {
        $this->currentDate = Carbon::today();
        $this->currentWeek = [];

        for($i = 0; $i < 7; $i++){
            $this->day = Carbon::today()->addDay($i)->format("m月d日");
            array_push($this->currentWeek,$this->day);
        }

        // dd($this->currentWeek);
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
