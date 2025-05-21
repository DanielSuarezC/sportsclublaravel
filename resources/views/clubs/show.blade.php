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

<a href="{{ url()->previous() }}" class="inline-block mt-6 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
    Volver
</a>
@endsection
