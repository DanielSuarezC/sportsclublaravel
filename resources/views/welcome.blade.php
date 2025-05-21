@extends('layouts.app')

@section('content')
<h2 class="text-xl font-semibold mb-4">Clubes de Ajedrez</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($clubs as $club)
        @include('components.card', [
            'title' => $club->name,
            'subtitle' => $club->location,
            'content' => 'Responsable: ' . $club->responsible
        ])
    @endforeach
</div>

<h2 class="text-xl font-semibold mt-10 mb-4">Eventos Públicos</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($events as $event)
        @include('components.card', [
            'title' => $event->name,
            'subtitle' => $event->location,
            'content' => $event->description
        ])
    @endforeach
</div>
@endsection
