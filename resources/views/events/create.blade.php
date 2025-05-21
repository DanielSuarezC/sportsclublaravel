@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Crear nuevo evento</h2>

<form action="{{ route('events.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    @csrf

    <div>
        <label class="block text-sm font-medium text-gray-700">Nombre del Evento</label>
        <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Fecha y Hora</label>
        <input type="datetime-local" name="start_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Duración (minutos)</label>
        <input type="number" name="duration" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Ubicación</label>
        <input type="text" name="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tipo de evento</label>
        <select name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="torneo">Torneo</option>
            <option value="entrenamiento">Entrenamiento</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Visibilidad</label>
        <select name="visibility" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            <option value="publico">Público</option>
            <option value="privado">Privado</option>
        </select>
    </div>

    <div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Crear evento</button>
    </div>
</form>
@endsection
