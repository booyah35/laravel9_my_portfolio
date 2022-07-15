<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, Host, User};
use Auth;

class HostController extends Controller
{
    public function host_login()
    {
        return view('host/login');
    }
    
    public function host_register()
    {
        return view('host/register');
    }
    
    public function host_top()
    {
        return view('host/top');
    }
    
    public function host_post_top()
    {
        return view('host/top');
    }
    
    public function mk_event(Sport $sport, Level $level, Host $host)
    {
        return view('host/mk_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'hosts' => $host->get(),
            ]);
    }
    
    public function str_event(Request $request, Event $event)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'outline' => ['required', 'string', 'max:300'],
            'address' => ['required'],
            'event_date' => ['required'],
            'start_time' => ['required'],
            'finish_time' => ['required'],
            'capacity' => ['required'],
        
            // 'name.required' => ['イベントのタイトルは必須です。'],
            // 'outline.required'  => 'イベントの概要は必須です。',
            // 'address.required'  => '開催地の住所は必須項目です。',
            // 'event_date.required'  => '開催日程は必須項目です。',
            // 'start_time.required'  => '開始時間は必須項目です。',
            // 'finish_time.required'  => '終了時間は必須項目です。',
            // 'capacity.required'  => '参加定員は必須項目です。',
        ]);
        
        $event->host_id=Auth::guard('host')->user()->id;
        $event->fill($request->input())->save();
        return redirect()->route('show_mked_event');
    }
    
    public function show_mked_event()
    {
        return view('host/show_mked_event');
    }
    
    public function edit_event(Event $event, Sport $sport, Level $level)
    {
        return view('host/edit_event' , compact('event'))->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            ]);
    }
    
    public function update_event(Request $request, Event $event)
    {
        // dd($event);
        $input_event = $request['event'];
        $event->host_id=Auth::guard('host')->user()->id;
        $event->fill($input_event)->save();
        // dd($event);

        return view('host/update_event' , compact('event'));
    }
    
    public function host_cfm_event(Sport $sport, Level $level, Event $event)
    {
        return view('host/cfm_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => Auth::guard('host')->user()->events()->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->get(),
            ]);
    }
    public function detail_event(User $user, Event $event)
    {
        return view('host/detail_event' , compact('event'));
    }
    public function delete_event(Event $event)
    {
        $event->delete();
        return redirect()->route('host_cfm_event');
    }
    public function host_sch_event(Sport $sport, Level $level, Event $event)
    {
        return view('host/host_sch_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => $event->orderBy('event_date', 'desc')->get(),
            ]);
    }
    public function host_sch_rslt(Request $request, Sport $sport, Level $level)
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
        
        return view('host/host_sch_rslt', compact('searched_events'));
    }
}
