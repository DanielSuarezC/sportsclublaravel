<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::all();
        return view('clubs.index', compact('clubs'));
    }

    public function show(Club $club)
    {
        $club->load('users.roles');
        return view('clubs.show', compact('club'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'responsible' => 'required',
            'location' => 'required',
            'contact_info' => 'required',
        ]);

        Club::create([
            'name' => $request->name,
            'responsible' => $request->responsible,
            'location' => $request->location,
            'contact_info' => $request->contact_info,
        ]);

        return redirect()->route('clubs.index')->with('success', 'Club creado correctamente');
    }
}
