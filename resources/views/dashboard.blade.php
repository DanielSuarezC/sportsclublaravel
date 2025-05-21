@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold">Bienvenido, {{ Auth::user()->name }}</h2>

@if(Auth::user()->hasRole('administrador'))
    <p class="mt-2">Puedes gestionar tu club, crear eventos y asignar roles.</p>
    <a href="{{ route('clubs.index') }}" class="text-indigo-500 hover:underline">Ir a Clubes</a>
    <a href="{{ route('events.index') }}" class="text-indigo-500 hover:underline">Ver eventos</a>
    @endif
    
    @if(Auth::user()->hasRole('jugador'))
    <p class="mt-2">Revisa los eventos disponibles y únete a uno.</p>
    <a href="{{ route('events.index') }}" class="text-indigo-500 hover:underline">Ver eventos</a>
@endif
@endsection
