<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Host extends Authenticatable
{
    use HasFactory,Notifiable;
    
    public function sport()
    {
        return $this->belongsTo(Sport::class);	 	 
    }
    
    public function events()
    {
        return $this->hasMany(Event::class);	 	 
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);	 	 
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'hometown',
        'sport_id',
        'age',
        'telephone',
        'profile_image',
    ];
}
