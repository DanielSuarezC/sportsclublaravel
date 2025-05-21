<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where('club_id', Auth::user()->club_id)->with('roles')->get();
        $roles = Role::all();

        return view('members.index', compact('members', 'roles'));

    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->roles()->syncWithoutDetaching([$request->role_id]);

        return back()->with('success', 'Rol asignado correctamente.');
    }

    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'membership_status' => 'required|in:activo,inactivo,suspendido',
        ]);

        $user->update(['membership_status' => $request->membership_status]);

        return back()->with('success', 'Estado actualizado.');
    }
}
