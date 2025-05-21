@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md p-4">
    <h2 class="text-2xl font-bold mb-2">{{ $club->name }}</h2>
    <p class="text-gray-600">Ubicación: {{ $club->location }}</p>
    <p class="text-gray-600 mb-4">Responsable: {{ $club->responsible }}</p>
</div>
<br>
<div class="bg-white rounded-xl shadow-md p-4">
    <h3 class="text-2xl font-bold mb-2">Miembros</h3>
    <ul class="list-disc list-inside">
        @foreach($club->users as $user)
            <li>{{ $user->name }} ({{ $user->roles->pluck('name')->join(', ') }})</li>
        @endforeach
    </ul>
</div>

<div class="mt-6">
        <a href="{{ route('clubs.index') }}" class="inline-block px-5 py-2 bg-blue-600 text-gray-800 rounded-md hover:bg-blue-700">
            ← Volver 
        </a>
</div>
@endsection
