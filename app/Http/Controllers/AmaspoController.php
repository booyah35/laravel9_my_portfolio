<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmaspoController extends Controller
{
    public function index()
    {
        return view('amaspo/index');
    }
    
     public function sch_event()
    {
        return view('amaspo/sch_event');
    }
    

}