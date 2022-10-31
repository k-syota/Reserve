<?php 
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventServices{

    public static function checkEventDuplication($event_date,$start_time,$end_time)
    {
        $check = DB::table('events')
        ->whereDate("start_date",$event_date)
        ->whereTime("end_date",">",$start_time)
        ->whereTime("start_date","<",$end_time)
        ->exists();

        return $check;
    }

    public static function joinDateAndTime($date,$time)
    {
        $join = $date. " " .$time;
        $date_time = Carbon::createFromFormat("Y-m-d H:i",$join);

        return $date_time;
    }

}

?>
