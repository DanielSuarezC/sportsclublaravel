@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Registrar nuevo usuario</h2>

<form method="POST" action="{{ route('users.store') }}" class="space-y-4 bg-white p-6 rounded shadow">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
        <input type="text" name="name" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
        <input type="email" name="email" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Documento de identidad</label>
        <input type="text" name="document" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Teléfono</label>
        <input type="text" name="phone" class="w-full mt-1 border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Rol</label>
        <select name="role_id" class="w-full mt-1 border rounded px-3 py-2" required>
            <option value="">Seleccione un rol</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
    </div>

<div>
    <label class="block text-sm font-medium text-gray-700">Club</label>
    <select name="club_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        <option value="">Seleccione un club</option>
        @foreach(\App\Models\Club::all() as $club)
            <option value="{{ $club->id }}">{{ $club->name }}</option>
        @endforeach
    </select>
</div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" name="password" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">
            Registrar usuario
        </button>
    </div>
</form>
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-4 rounded">
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
