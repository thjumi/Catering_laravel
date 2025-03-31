<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-bold">{{ $tarea->nombre }}</h3>
                <p class="text-gray-700 mt-2"><strong>Descripción:</strong> {{ $tarea->descripcion ?? 'No especificada' }}</p>
                <p class="text-gray-700 mt-2"><strong>Fecha de Tarea:</strong> {{ $tarea->fechaTarea }}</p>
                <p class="text-gray-700 mt-2"><strong>Evento:</strong> {{ $tarea->evento->nombre ?? 'Sin evento' }}</p>
                <p class="text-gray-700 mt-2"><strong>Empleado:</strong> {{ $tarea->empleado->name ?? 'No asignado' }}</p>
                <div class="mt-4">
                    <a href="{{ route('tareas.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
