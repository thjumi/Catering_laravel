<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <!-- Botón para añadir una nueva tarea -->
                    <a href="{{ route('tareas.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Crear Nueva Tarea
                    </a>

                    <!-- Tabla de listado de tareas -->
                    <table class="w-full mt-6 border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr class="text-left text-gray-700">
                                <th class="px-4 py-2 border-b">ID</th>
                                <th class="px-4 py-2 border-b">Nombre</th>
                                <th class="px-4 py-2 border-b">Descripción</th>
                                <th class="px-4 py-2 border-b">Fecha</th>
                                <th class="px-4 py-2 border-b">Evento</th>
                                <th class="px-4 py-2 border-b">Empleado</th>
                                <th class="px-4 py-2 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($tareas->isEmpty())
                                <tr>
                                    <td colspan="7" class="px-4 py-2 text-center text-gray-500">
                                        No hay tareas registradas.
                                    </td>
                                </tr>
                            @else
                                @foreach($tareas as $tarea)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $tarea->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $tarea->nombre }}</td>
                                        <td class="px-4 py-2 border-b">{{ $tarea->descripcion ?? 'Sin descripción' }}</td>
                                        <td class="px-4 py-2 border-b">{{ $tarea->fechaTarea }}</td>
                                        <td class="px-4 py-2 border-b">{{ $tarea->evento->nombre ?? 'Sin evento' }}</td>
                                        <td class="px-4 py-2 border-b">{{ $tarea->empleado->name ?? 'No asignado' }}</td>
                                        <td class="px-4 py-2 border-b">
                                            <a href="{{ route('tareas.show', $tarea->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Ver</a>
                                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Editar</a>
                                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="inline ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
