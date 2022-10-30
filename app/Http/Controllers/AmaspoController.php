<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Sport, Level, Event, User, Host, Review};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;
use Carbon\Carbon;

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
    
    public function sch_rslt(Request $request, Sport $sport, Level $level)
    {
        // dd($request);
        //検索フォームに入力された値を取得
        $rslt_sport = $request->input('sport');
        $rslt_level = $request->input('level');
        $rslt_event_date = $request->input('event_date');
        

        $query = Event::query();
        
        if(!empty($rslt_sport)) {
            $query->where('sport_id', $rslt_sport);
        }

        if(!empty($rslt_level)) {
            $query->where('level_id', $rslt_level);
        }

        if(!empty($rslt_event_date)) {
            $query->where('event_date', 'LIKE', $rslt_event_date);
        }
        
        $searched_events = $query->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->paginate(15);
        return view('amaspo/sch_rslt', compact('searched_events'))->with([
            'sports' => $sport->get(),
            'levels' => $level->get(),
            // 'events' => $event->get(),
            ]);
    }
    
    public function detail_event(User $user, Event $event)
    {
        $date = Carbon::now();
        $client = new \GuzzleHttp\Client();
        $url = 'https://maps.googleapis.com/maps/api/js?key';
        $api_use = config('services.googlemap.key');
        return view('amaspo/detail_event' , compact('event'), compact('date'));
    }
    
    public function join_event(Request $request, Event $event)
    {
        $event->users()->attach(Auth::id());
        return back();
    }
    
    public function cancel_join_event(Sport $sport, Level $level, Event $event)
    {
        $event->users()->detach(Auth::id());
        return back();
    }
    
    public function show_join_event(Event $event)
    {
        return view('amaspo/join_event');
    }
    
    public function cfm_event(Sport $sport, Level $level, Event $event)
    {
        $date = Carbon::now();
        return view('amaspo/cfm_event', compact('date'))->with([
            'events' => Auth::guard('web')->user()->events()->orderBy('event_date', 'desc')->orderBy('start_time', 'desc')->paginate(10),
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
        dd($request);
        $review->host_id=$request->host_=
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
        return view('amaspo/show_profile');
    }
    public function edit_profile(User $user)
    {
        return view('amaspo/edit_profile');
    }
    public function show_host_profile(Host $host)
    {
        return view('amaspo/show_host_profile' , compact('host'));
    }
    public function follow_host(Request $request, Host $host)
    {
        $host->users()->attach(Auth::id()); 
        return back();
    }
    public function unfollow_host(Request $request, Host $host)
    {
        $host->users()->detach(Auth::id());
        return back();
    }
    public function index_follow_host(Host $host)
    {
        return view('amaspo/index_follow_host')->with([
            'hosts' => Auth::guard('web')->user()->hosts()->get(),
            ]);
    }
    public function update_profile(Request $request, User $user)
    {
        
        $user = User::find($request->user()->id);
        if ($request->profile_image != null) {
            
            $prf_img = $request->file('profile_image');
            
            $path = Storage::disk('s3')->putFile('user_prf_img', $prf_img, 'public');
            // dd($prf_img);
            // if ($path){
            //     $user->profile_image = Storage::disk('s3')->url($path);
            // }
            // dd($path);
            // dd($user);
            // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profile_imagesに保存し、そのファイル名（ファイルパス）を$profileImagePathとして生成
            $profileImagePath = $request->profile_image->store('public/profile_images');
            // $updateUserのprofile_imageカラムに$profileImagePath（ファイルパス）を保存
            $user->profile_image = $profileImagePath;
        }
        $user_post = $request["user"];
        $user->fill($user_post)->save();
        return view('amaspo/update_profile');
    }
}

