<?php

namespace App\Http\Livewire;

use App\Services\EventServices;
use Carbon\CarbonImmutable;
use Livewire\Component;

class Calendar extends Component
{

    public $currentDate;
    public $currentWeek;
    public $day;
    public $checkDay; //日付判定用
    public $dayOfWeek;
    public $sevenDaysLater;
    public $events;

    public function mount()
    {
        $this->currentDate = CarbonImmutable::today();
        $this->sevenDaysLater = $this->currentDate->addDay(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents($this->currentDate->format('Y-m-d'),$this->sevenDaysLater->format('Y-m-d'));

        for($i = 0; $i < 7; $i++){
            $this->day = CarbonImmutable::today()->addDay($i)->format("m月d日");
            $this->checkDay = CarbonImmutable::today()->addDay($i)->format("Y-m-d");
            $this->dayOfWeek = CarbonImmutable::today()->addDay($i)->dayName;
            array_push($this->currentWeek,[
                "day" => $this->day,
                "checkDay" => $this->checkDay,
                "dayOfWeek" => $this->dayOfWeek,
            ]);
        }

        // dd($this->currentWeek);
    }

    public function getDate($date)
    {
        $this->currentDate = $date;
        $this->sevenDaysLater = CarbonImmutable::parse($this->currentDate)->addDay(7);
        $this->currentWeek = [];

        $this->events = EventServices::getWeekEvents($this->currentDate,$this->sevenDaysLater->format('Y-m-d'));

        for($i = 0; $i < 7; $i++){
            $this->day = CarbonImmutable::parse($this->currentDate)->addDay($i)->format("m月d日"); //parseでCarbonインスタンスに変換
            $this->checkDay = CarbonImmutable::parse($this->currentDate)->addDay($i)->format("Y-m-d");
            $this->dayOfWeek = CarbonImmutable::parse($this->currentDate)->addDay($i)->dayName;
            array_push($this->currentWeek,[
                "day" => $this->day,
                "checkDay" => $this->checkDay,
                "dayOfWeek" => $this->dayOfWeek,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
