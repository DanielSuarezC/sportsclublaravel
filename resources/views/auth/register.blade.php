<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fuente opcional -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br bg from-indigo-100 via-white to-indigo-200 font-sans antialiased min-h-screen flex items-center justify-center">

    <x-guest-layout>
        <x-auth-card class="shadow-xl bg-white rounded-xl w-full max-w-md p-8">
            <x-slot name="logo">
                <a href="/" class="flex justify-center mb-4">
                    <x-application-logo class="w-20 h-20 text-indigo-600" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700" />
                    <x-input id="name" 
                             class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                             type="text" 
                             name="name" 
                             :value="old('name')" 
                             required 
                             autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                    <x-input id="email" 
                             class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                             type="email" 
                             name="email" 
                             :value="old('email')" 
                             required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-700" />
                    <x-input id="password" 
                             class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                             type="password"
                             name="password"
                             required 
                             autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700" />
                    <x-input id="password_confirmation" 
                             class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                             type="password"
                             name="password_confirmation" 
                             required />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-indigo-600 hover:text-indigo-900 transition ease-in-out duration-150" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</body>
</html>
