@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #1e3c72, #2a5298);
        min-height: 100vh;
    }

    .section-title {
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .card-custom {
        background: linear-gradient(135deg, #f8f9fa, #e3e6f0);
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    .card-title, .card-subtitle {
        color: #343a40;
    }
</style>

<div class="container py-5">
    <div class="flex justify-center mb-6">
        <iframe title="vimeo-player" src="https://player.vimeo.com/video/1093424643?h=08adbf053e&autoplay=1&muted=1&controls=0&loop=1&background=1"
            frameborder="0" 
            class="w-full max-w-4xl rounded-md shadow-md aspect-video">
        </iframe>
    </div>
    <h2 class="section-title mb-4">Clubes de Ajedrez</h2>
    <div class="row g-4">
        @foreach($clubs as $club)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card card-custom h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $club->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $club->location }}</h6>
                        <p class="card-text">Responsable: {{ $club->responsible }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h2 class="section-title mt-5 mb-4">Eventos Públicos</h2>
    <div class="row g-4">
        @foreach($events as $event)
            @if($event->visibility === 'publico')
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card card-custom h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
