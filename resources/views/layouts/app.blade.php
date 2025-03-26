<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
            <nav class="bg-blue-600 p-4 text-white flex justify-between items-center">
        <div>
            <a href="{{ route('eventos.index') }}" class="px-3">Eventos</a>
            <a href="{{ route('tareas.index') }}" class="px-3">Tareas</a>
            <a href="{{ route('insumos.index') }}" class="px-3">Insumos</a>
            <a href="{{ route('empleados.index') }}" class="px-3">Empleados</a>
            <a href="{{ route('profile.edit') }}" class="px-3">Perfil</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 rounded">Cerrar sesión</button>
        </form>
    </nav>
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-4">
        @yield('content')
    </div>
</body>
</html>

-- resources/views/eventos/index.blade.php --
@extends('layouts.layout')
@section('title', 'Eventos')
@section('content')
    <h1 class="text-3xl font-bold mb-4">Eventos</h1>
    <a href="{{ route('eventos.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Crear Nuevo Evento</a>
    <table class="w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2">Nombre</th>
                <th class="border border-gray-300 p-2">Fecha</th>
                <th class="border border-gray-300 p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr class="text-center">
                    <td class="border border-gray-300 p-2">{{ $evento->nombre }}</td>
                    <td class="border border-gray-300 p-2">{{ $evento->fecha }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('eventos.show', $evento->id) }}" class="text-blue-500">Ver</a>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="text-yellow-500">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
            </main>
        </div>
    </body>
</html>
