@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md p-4">
    <h2 class="text-center text-2xl font-bold ">{{ $event->name }}</h2>
    <p class="text-xl text-gray-700">{{ $event->description }}</p>
    <p class="mt-2 text-sm text-gray-500">Tipo de evento: {{ $event->type }}</p>
    <p class="mt-2 text-sm text-gray-500">Ubicación: {{ $event->location }}</p>
    <p class="mt-2 text-sm text-gray-500">Fecha de inicio: {{ $event->start_time->format('d/m/Y H:i') }}</p>
    
    <p class="mt-2 text-sm text-gray-500">Duración: {{ $event->duration }} horas</p>
    <p class="mt-2 text-sm text-gray-500">Visibilidad: {{ $event->visibility }}</p>
</div>
<br>
<div class="bg-white rounded-xl shadow-md p-4">
    @php
        $enrollments = \App\Models\Enrollment::with('user.roles')
            ->where('event_id', $event->id)
            ->get();
    @endphp

    @if($enrollments->count())
        <h3 class="text-2xl font-bold mb-2">Inscritos</h3>
        <ul class="list-disc list-inside">
            @foreach($enrollments as $enrollment)
                <li>
                    {{ $enrollment->user->name }} - 
                    Roles: {{ $enrollment->user->roles->pluck('name')->join(', ') }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="flex items-center space-x-3">
    @auth
        <form method="POST" action="{{ route('events.enroll', $event) }}" class="mt-4">
            @csrf
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Inscribirme
            </button>
            <a href="{{ route('events.index') }}" class="inline-block mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Volver
            </a>
        </form>
    @endauth
</div>
@endsection
