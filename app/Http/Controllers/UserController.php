<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'document' => 'required|unique:users',
                'password' => 'required|min:8|confirmed',
                'role_id' => 'required|exists:roles,id',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'document' => $request->document,
                'phone' => $request->phone,
                'club_id' => $request->club_id,
                'password' => Hash::make($request->password),
            ]);

            $user->roles()->attach($request->role_id);

            return redirect()->route('dashboard')->with('success', 'Usuario registrado correctamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al registrar el usuario: ' . $e->getMessage()])
                        ->withInput();
        }
    }

}
