@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Gestión de miembros del club</h2>
    <br>
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Estado</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Roles</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($members as $member)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $member->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $member->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('members.updateStatus', $member) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="membership_status" onchange="this.form.submit()" class="w-full border-gray-300 rounded-md shadow-sm text-sm px-2 py-1 focus:ring-indigo-500 focus:border-indigo-500">
                                <option {{ $member->membership_status === 'activo' ? 'selected' : '' }}>activo</option>
                                <option {{ $member->membership_status === 'inactivo' ? 'selected' : '' }}>inactivo</option>
                                <option {{ $member->membership_status === 'suspendido' ? 'selected' : '' }}>suspendido</option>
                            </select>
                        </form>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $member->roles->pluck('name')->join(', ') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('members.assignRole', $member) }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <select name="role_id" class="border-gray-300 rounded-md shadow-sm text-sm px-2 py-1 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            
                            <button type="submit" class="ml-6 bg-indigo-600 text-white text-sm px-3 py-1 rounded-md hover:bg-indigo-700">
                                Asignar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="inline-block px-5 py-2 bg-blue-600 text-gray-800 rounded-md hover:bg-blue-700">
            ← Volver al Dashboard
        </a>
    </div>
</div>
@endsection
