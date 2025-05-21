@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-2">
    <div class="bg-white shadow-md rounded-2xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido, {{ Auth::user()->name }}</h2>

        @if(Auth::user()->hasRole('administrador'))
            <p class="text-gray-600 mb-6">Tienes permisos de administrador para gestionar tu club, crear eventos y asignar roles.</p>
            <br>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="{{ route('clubs.index') }}" class="bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold py-4 px-6 rounded-xl text-center transition shadow">
                    Gestionar Clubes
                </a>
                <br>
                <a href="{{ route('events.index') }}" class="bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold py-4 px-6 rounded-xl text-center transition shadow">
                    Ver Eventos
                </a>
                <br>
                <a href="{{ route('members.index') }}" class="bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold py-4 px-6 rounded-xl text-center transition shadow">
                    Gestionar Miembros
                </a>
                <br>
            </div>
        @endif

        @if(Auth::user()->hasRole('jugador'))
            <p class="text-gray-600 mb-6">Consulta los eventos disponibles y únete a tus favoritos.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="{{ route('events.index') }}" class="bg-green-100 hover:bg-green-200 text-green-800 font-semibold py-4 px-6 rounded-xl text-center transition shadow">
                    Ver Eventos Disponibles
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

