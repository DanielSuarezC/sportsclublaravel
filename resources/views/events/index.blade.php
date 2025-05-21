@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Eventos</h2>
@if (Auth::user()->hasRole('administrador'))

<a href="{{ route('events.create') }}" class="mb-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Crear evento</a>
@endif
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($events as $event)
        <div class="bg-white rounded-xl shadow-md p-4">
            <h3 class="text-lg font-bold text-indigo-700">{{ $event->name }}</h3>
            <h4 class="text-sm text-gray-500">Fecha y hora de inicio: {{ $event->start_time->format('d/m/Y H:i') }}</h4>
            <p class="mt-2 text-gray-700 text-sm">{{ $event->description }}</p>
            <a href="{{ route('events.show', $event) }}" class="mt-2 text-indigo-500 hover:underline">Ver detalles</a>
        </div>
    @endforeach
</div>
<a href="{{ route('dashboard') }}" class="inline-block mt-6 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
    Volver
</a>
@endsection
