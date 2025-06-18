<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsClubManager</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
</head>

<body class=" text-gray-900"  style='background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("assets/background3.jpg");'>
    <header class="bg-white shadow">
        <nav class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Sports Club Manager</h1>

            @auth
                <ul class="space-x-10 items-center list-none">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 hover:underline">
                        Panel
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 hover:underline bg-transparent border-none p-0 m-0 cursor-pointer">
                            Cerrar sesión
                        </button>
                    </form>
                </ul>
            @else
                <div>                  
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:underline m-2">Iniciar sesión</a>
                    <a href="{{ route('users.create') }}"
                        class="text-sm text-gray-700 hover:underline">
                        Crear cuenta
                    </a>
                </div>
            @endauth
        </nav>
    </header>

    <main class="py-6 px-4 max-w-7xl mx-auto">
        @yield('content')
    </main>
    <!-- Bootstrap JS Bundle (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
