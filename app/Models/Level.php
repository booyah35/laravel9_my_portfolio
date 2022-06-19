<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamp=false;
    
    public function events()   
    {
        return $this->hasMany(Event::class);  
    }
}
