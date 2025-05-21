@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Crear nuevo club</h2>

<form action="{{ route('clubs.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700">Nombre del Club</label>
        <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Responsable</label>
        <input type="text" name="responsible" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Email de contacto</label>
        <input type="email" name="contact_info" class="w-full mt-1 border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Ubicación</label>
        <input type="text" name="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
    </div>
</form>
@endsection
