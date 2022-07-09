<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    public function host()
    {
        return $this->belongsTo(Host::class);	 
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);	 
    }
    
    protected $fillable = [
        'host_id',
        'user_id',
        'evaluation',
        'comments',
    ];
}
