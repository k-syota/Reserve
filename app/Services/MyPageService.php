<?php

namespace App\Services;

use Carbon\Carbon;

class MyPageService{

    public static function reservedEvent($events, $string)
    {
        $reservedEvent = [];
        if($string === 'fromToday'){
            foreach($events->sortBy('start_date')as $events){
                if(is_null($events->pivot->canceled_date) && $events->start_date >= Carbon::now()->format('Y-m-d 00:00:00')){
                    $eventInfo = [
                        'id' => $events->id,
                        'name' => $events->name,
                        'start_date' => $events->start_date,
                        'end_date' => $events->end_date,
                        'number_of_people' => $events->pivot->number_of_people,
                    ];
                    array_push($reservedEvent,$eventInfo);
                }
            }
        }
        if($string === 'past'){
            foreach($events->sortByDesc('start_date')as $events){
                if(is_null($events->pivot->canceled_date) && $events->start_date < Carbon::now()->format('Y-m-d 00:00:00')){
                    $eventInfo = [
                        'id' => $events->id,
                        'name' => $events->name,
                        'start_date' => $events->start_date,
                        'end_date' => $events->end_date,
                        'number_of_people' => $events->pivot->number_of_people,
                    ];
                    array_push($reservedEvent,$eventInfo);
                }
            }
        }

        return $reservedEvent;
    }

}
