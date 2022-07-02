<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function host()
    {
        return $this->belongsTo(Host::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    protected $fillable = [
        'name',
        'outline',
        'address',
        'event_date',
        'start_time',
        'finish_time',
        'capacity',
        'sport_id',
        'level_id',
        'host_id',
    ];

}

