<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
}
