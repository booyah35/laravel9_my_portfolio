<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, User, Host, Review};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    
    public function guest_sch_event(Sport $sport, Level $level, Event $event)
    {
        return view('guest/sch_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => $event->orderBy('event_date', 'desc')->get(),
            ]);
    }
    
    public function guest_sch_rslt(Request $request, Sport $sport, Level $level)
    {
        // dd($request);
        //検索フォームに入力された値を取得
        $sport = $request->input('sport');
        $level = $request->input('level');
        $event = $request->input('event');
        

        $query = Event::query();
        
        if(!empty($sport)) {
            $query->where('sport_id', $sport);
        }

        if(!empty($level)) {
            $query->where('level_id', $level);
        }

        if(!empty($event)) {
            $query->where('event_date', 'LIKE', $event);
        }

        $searched_events = $query->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->get();
        
        return view('guest/sch_rslt', compact('searched_events'));
    }
    
    public function guest_detail_event(User $user, Event $event)
    {
        $client = new \GuzzleHttp\Client();
        $url = 'https://maps.googleapis.com/maps/api/js?key';
        $api_use = config('services.googlemap.key');
        return view('guest/detail_event' , compact('event'));
    }
    public function guest_mk_event()
    {
        return view('guest/mk_event');
    }
   
}

