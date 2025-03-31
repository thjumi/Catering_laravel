<x-app-layout>
    <div class="container mx-auto p-6 max-w-xl bg-gray-800 rounded-lg shadow-lg text-white">
        <h1 class="text-center mb-6 text-3xl font-bold">Detalles del Evento</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Nombre del Evento:</h2>
            <p>{{ $evento->nombre }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Fecha:</h2>
            <p>{{ $evento->fecha }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Horario:</h2>
            <p>{{ $evento->horario }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Empleado Asignado:</h2>
            <p>{{ $evento->empleado?->name ?? 'No asignado' }}</p>
        </div>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">Descripción:</h2>
            <p>{{ $evento->descripcion }}</p>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('eventos.index') }}" class="text-green-400 hover:text-green-500 underline">Volver al listado de eventos</a>
        </div>
    </div>
</x-app-layout>
