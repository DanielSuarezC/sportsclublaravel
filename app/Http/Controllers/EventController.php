<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Club;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        // $events_public = Event::with('club')->where('visibility', 'publico')->get();
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_time' => 'required|date',
            'duration' => 'required|integer',
            'location' => 'required',
            'type' => 'required|in:torneo,entrenamiento',
            'visibility' => 'required|in:publico,privado',
        ]);

       Event::create([
            'club_id' => Auth::user()->club_id,
            'name' => $request->name,
            'description' => $request->description,
            'start_time' => $request->start_time,
            'duration' => $request->duration,
            'location' => $request->location,
            'type' => $request->type,
            'visibility' => $request->visibility,
            'capacity' => $request->capacity,
        ]);


        return redirect()->route('events.index')->with('success', 'Evento creado');
    }

    public function enroll(Event $event)
    {
        $user = Auth::user();

        if ($event->participants()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'Ya estás inscrito en este evento');
        }

        $event->participants()->attach($user->id);

        return back()->with('success', 'Inscripción exitosa');
    }
}
