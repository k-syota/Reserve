<?php

namespace App\Http\Livewire;

use App\Services\EventServices;
use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{

    public $currentDate;
    public $currentWeek;
    public $day;
    public $sevenDaysLater;
    public $events;

    public function mount()
    {
        $this->currentDate = CarbonImmutable::today();
        $this->sevenDaysLater = $this->currentDate->addDay(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents($this->currentDate->format('Y-m-d'),$this->sevenDaysLater->format('Y-m-d'));

        for($i = 0; $i < 7; $i++){
            $this->day = Carbon::today()->addDay($i)->format("m月d日");
            array_push($this->currentWeek,$this->day);
        }

        // dd($this->events);
    }

    public function getDate($date)
    {
        $this->currentDate = $date;
        $this->sevenDaysLater = Carbon::parse($this->currentDate)->addDay(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents($this->currentDate,$this->sevenDaysLater->format('Y-m-d'));

        for($i = 0; $i < 7; $i++){
            $this->day = Carbon::parse($this->currentDate)->addDay($i)->format("m月d日"); //parseでCarbonインスタンスに変換
            array_push($this->currentWeek,$this->day);
        }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
