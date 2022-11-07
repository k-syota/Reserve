<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\EventServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = DB::table("events")
        ->orderBy("start_date","asc")
        ->paginate(10);

        return view("manager.events.index",compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("manager.events.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {

        $check = EventServices::checkEventDuplication(
            $request["event_date"],$request["start_time"],$request["end_time"]
        );


        $start_date = EventServices::joinDateAndTime($request["event_date"],$request["start_time"]);
        $end_date = EventServices::joinDateAndTime($request["event_date"],$request["end_time"]);

        if(!$check){
            Event::create([
                "name" => $request["event_name"],
                "information" => $request["information"],
                "start_date" => $start_date,
                "end_date" => $end_date,
                "max_people" => $request["max_people"],
                "is_visible" => $request["is_visible"],
            ]);
    
            session()->flash("status","登録OKです");
    
            return to_route("events.index");
        }else{
            session()->flash("status","この時間帯は他の予約があります");
            return view("manager.events.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $eventDate = $event->eventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        return view("manager.events.show",compact("event","eventDate","startTime","endTime"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $eventDate = $event->editEventDate;
        $startTime = $event->startTime;
        $endTime = $event->endTime;
        return view("manager.events.edit",compact("event","eventDate","startTime","endTime"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $check = EventServices::countEventDuplication(
            $request["event_date"],$request["start_time"],$request["end_time"]
        );


        $start_date = EventServices::joinDateAndTime($request["event_date"],$request["start_time"]);
        $end_date = EventServices::joinDateAndTime($request["event_date"],$request["end_time"]);

        if($check <= 1){
            $event = Event::findOrFail($event->id);
            $event->update([
                "name" => $request["event_name"],
                "information" => $request["information"],
                "start_date" => $start_date,
                "end_date" => $end_date,
                "max_people" => $request["max_people"],
                "is_visible" => $request["is_visible"],
            ]);
    
            session()->flash("status","更新OKです");
    
            return to_route("events.index");
        }else{
            session()->flash("status","この時間帯は他の予約があります");
            $eventDate = $event->editEventDate;
            $startTime = $event->startTime;
            $endTime = $event->endTime;
            return view("manager.events.edit",compact("event","eventDate","startTime","endTime"));
        }
    }

    public function past()
    {
        $today = Carbon::today();
        $events = DB::table("events")
                    ->whereDate('start_date', '<', $today)
                    ->orderBy("start_date","asc")
                    ->paginate(10);

        return view("manager.events.past",compact("events"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
