<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, Host};
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
    
    public function host_cfm_event(Sport $sport, Level $level, Event $event)
    {
        return view('host/cfm_event')->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            'events' => Auth::guard('host')->user()->events()->get(),
            
            ]);
        
    }
}
