<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, User, Host, Review};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'events' => $event->orderBy('event_date', 'desc')->get(),
            ]);
    }
    
    public function sch_rslt(Request $request, Sport $sport, Level $level)
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
        
        return view('amaspo/sch_rslt', compact('searched_events'));
    }
    
    public function detail_event(User $user, Event $event)
    {
        // $participants = DB::table('event_user')
        //     ->select('event_id')
        //     ->selectRaw('COUNT(user_id) as count_participants')
        //     ->groupBy('event_id')
        //     ->get();
        
        // dd($event->users()->count());
        
        $client = new \GuzzleHttp\Client();
        $url = 'https://maps.googleapis.com/maps/api/js?key';
        $api_use = config('services.googlemap.key');
        return view('amaspo/detail_event' , compact('event'));
    }
    
    public function join_event(Request $request, Event $event)
    {
        $event->users()->attach(Auth::id()); 
        return redirect('/join_event/'. $event->id);
        
    }
    
    public function cancel_join_event(Sport $sport, Level $level, Event $event)
    {
        // dd($event);
        $event->users()->detach(Auth::id());
        return redirect('/cfm_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => Auth::guard('web')->user()->events()->get(),
            ]);
    }
    
    public function show_join_event(Event $event)
    {
        return view('amaspo/join_event');
    }
    
    public function cfm_event(Sport $sport, Level $level, Event $event)
    {
        return view('amaspo/cfm_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => Auth::guard('web')->user()->events()->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->get(),
            ]);
    }
    
    public function mk_review(Host $host, User $user)
    {
        return view('amaspo/mk_review')->with([
            'hosts' => $host->get(),
            $user = Auth::id(),
            ]);
    }
    
    public function str_review(Request $request, Review $review, Host $host, User $user)
    {
        $request->validate([
            'evaluation' => ['required'],
            'comments' => ['required', 'string', 'max:800'],
        ]);
        // dd($request);
        $review->user_id=Auth::guard('web')->user()->id;
        $review->fill($request->input())->save();
       

        return view('amaspo/fnsh_review');
    }    
    
    public function mk_event()
    {
        return view('amaspo/mk_event');
    }
    
    public function show_profile(User $user)
    {
        return view('amaspo/show_profile')->with([
            $user = Auth::guard('web'),
            ]);
    }
    public function edit_profile(User $user)
    {
        return view('amaspo/edit_profile')->with([
            $user = Auth::guard('web'),
            ]);
    }
    public function update_profile(Request $request, User $user)
    {
        $user = User::find($request->user()->id);
        $user_post = $request["user"];
        $user->fill($user_post)->save();
        return view('amaspo/update_profile');
    }
}

