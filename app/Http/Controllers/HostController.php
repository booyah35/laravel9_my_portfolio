<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, Host, User};
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    
    public function store(LoginRequest $request, Host $host)
    {
        $check = $request->only('email', 'password');

        $host = Host::where('email', $check['email'])->first();
        // $hashedPassword = Host::where('password', $check['password']);
       
       if($host){
           $hashedPassword = $host->password;
       } else {
           return back()->with(['msg' => 'Your email was rejected']);
       }
       

        if(!Hash::check($check['password'], $hashedPassword))
            return back()->with('Your password was rejected');

        \Illuminate\Support\Facades\Auth::guard('host')->login($host);
        return redirect(RouteServiceProvider::HOST_HOME);

        return back()->with('Your request was rejected');
    }
    public function destroy(Request $request)
    {
        \Illuminate\Support\Facades\Auth::guard('host')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
        
            // 'name.required' => ['?????????????????????????????????????????????'],
            // 'outline.required'  => '???????????????????????????????????????',
            // 'address.required'  => '??????????????????????????????????????????',
            // 'event_date.required'  => '????????????????????????????????????',
            // 'start_time.required'  => '????????????????????????????????????',
            // 'finish_time.required'  => '????????????????????????????????????',
            // 'capacity.required'  => '????????????????????????????????????',
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
        //????????????????????????????????????????????????
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
        $searched_events = $query->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->paginate(15);
        return view('host/host_sch_rslt', compact('searched_events'));
    }
    public function host_show_profile(Host $host)
    {
        return view('host/host_show_profile');
    }
    public function host_edit_profile(Host $host)
    {
        return view('host/host_edit_profile');
    }
    public function host_update_profile(Request $request, Host $host)
    {
        // dd($request);
        $host = Host::find($request->user()->id);
        if ($request->profile_image != null) {
            // store???????????????????????????????????????????????????????????????storage/app/public/profile_images???????????????????????????????????????????????????????????????$profileImagePath???????????????
            $profileImagePath = $request->profile_image->store('public/profile_images');
            // $updateUser???profile_image????????????$profileImagePath?????????????????????????????????
            $host->profile_image = $profileImagePath;
        }
        $host_post = $request["host"];
        $host->fill($host_post)->save();
        return view('host/host_update_profile');
    }
}
