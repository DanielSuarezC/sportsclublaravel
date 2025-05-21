<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_id', 
        'name', 
        'description', 
        'start_time',
        'duration', 
        'location', 
        'type', 
        'visibility', 
        'capacity'
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

}
