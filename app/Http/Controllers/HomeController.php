<?php
namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $clubs = Club::all();
        $events = Event::where('visibility', 'publico')->get();
        return view('welcome', compact('clubs', 'events'));
    }
}
