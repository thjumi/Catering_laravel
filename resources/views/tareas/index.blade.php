<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <!-- Opcional: Botón para crear tarea -->
                <div class="mb-4">
                    <a href="{{ route('tareas.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Crear Nueva Tarea
                    </a>
                </div>

                <!-- Tabla de listado de tareas -->
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Descripción</th>
                            <th class="px-4 py-2 border">Fecha de Tarea</th>
                            <th class="px-4 py-2 border">Empleado</th>
                            <th class="px-4 py-2 border">Estado</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tareas as $tarea)
                            <tr>
                                <td class="px-4 py-2 border">{{ $tarea->nombre }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->descripcion }}</td>
                                <td class="px-4 py-2 border">{{ $tarea->fechaTarea }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $tarea->empleado->name ?? 'No asignado' }}
                                </td>
                                <td class="px-4 py-2 border">{{ $tarea->estado }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('tareas.edit', $tarea->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Editar
                                    </a>
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-500">No hay tareas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

