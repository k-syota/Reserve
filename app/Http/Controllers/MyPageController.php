<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MyPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class MyPageController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $events = $user->events;
        $fromTodayEvents = MyPageService::reservedEvent($events,'fromToday');
        $fromPastEvents = MyPageService::reservedEvent($events,'past');

        // dd($events);
        dd($fromPastEvents,$fromTodayEvents);

        return view('mypage/index',compact('fromTodayEvents','fromPastEvents'));
    }
}
