@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Mis Clubes</h2>
<a href="{{ route('clubs.create') }}" class="mb-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Crear nuevo club</a>
<div class="space-y-4">
    @foreach($clubs as $club)
        <div class="bg-white shadow rounded-lg p-4">
            <h3 class="text-lg font-semibold">{{ $club->name }}</h3>
            <p class="text-sm text-gray-600">{{ $club->location }}</p>
            <a href="{{ route('clubs.show', $club) }}" class="text-indigo-500 hover:underline">Ver detalles</a>
        </div>
    @endforeach
</div>
<div class="mt-6">
        <a href="{{ route('dashboard') }}" class="inline-block px-5 py-2 bg-blue-600 text-gray-800 rounded-md hover:bg-blue-700">
            ← Volver al Dashboard
        </a>
</div>
@endsection
