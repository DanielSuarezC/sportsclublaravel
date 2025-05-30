<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'responsible', 
        'location', 
        'contact_info'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function events() {
        return $this->hasMany(Event::class);
    }
}
