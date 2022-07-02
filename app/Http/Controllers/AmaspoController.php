<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, User};
use Illuminate\Support\Facades\Auth;

class AmaspoController extends Controller
{
    public function index()
    {
        return view('amaspo/index');
    }
    
    public function sch_event(Sport $sport, Level $level, Event $event)
    {
        return view('amaspo/sch_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => $event->get(),
            ]);
    }
    
    public function sch_rslt(Request $request)
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

        $searched_events = $query->get();
        
        return view('amaspo/sch_rslt', compact('searched_events'));
    }
    
    public function detail_event(User $user, Event $event)
    {
        return view('amaspo/detail_event' , compact('event'));
    }
    
    public function join_event(Request $request, Event $event)
    {
        
        
        $event->users()->attach(Auth::id()); 
        return redirect('/join_event/'. $event->id);
        
    }
    
    public function show_join_event(Event $event)
    {
    
        return view('amaspo/join_event');
        
    }
}

