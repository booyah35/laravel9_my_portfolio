<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public $timestamps = false;
    
    protected $table = 'sports';
    
    public function events()   
    {
        return $this->hasMany(Event::class);  
    }
    
    public function hosts()   
    {
        return $this->hasMany(Host::class);  
    }
    
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
    
}

