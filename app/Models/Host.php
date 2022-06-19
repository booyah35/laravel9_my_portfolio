<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Host as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Host extends Authenticatable
{
    use HasFactory,Notifiable;
    
    public function sport()
    {
        return $this->belongsTo(Sport::class);	 	 
    }
    
    
}
