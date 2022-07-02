<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Host;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('host_register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'hometown' => ['required', 'string', 'max:25'],
            'telephone' => ['required'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'string'],
            'sport_id' => ['required', 'integer'],
        ]);

        $host = Host::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hometown' => $request->hometown,
            'telephone' => $request->telephone,
            'age' => $request->age,
            'gender' => $request->gender,
            'sport_id' => $request->sport_id,
            
        ]);

        event(new Registered($host));

        Auth::guard( name: 'host')->login($host);

        return redirect(RouteServiceProvider::HOME);
    }
}
