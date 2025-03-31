<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <!-- Botón para añadir una nueva tarea -->
                    <a href="{{ route('tareas.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Crear Nueva Tarea
                    </a>

                    <!-- Tabla de listado de tareas -->
                    <table class="w-full mt-6 border border-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr class="text-left text-gray-700 dark:text-gray-300">
                                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                                <th class="px-4 py-2 border-b border-gray-300">Nombre</th>
                                <th class="px-4 py-2 border-b border-gray-300">Descripción</th>
                                <th class="px-4 py-2 border-b border-gray-300">Fecha</th>
                                <th class="px-4 py-2 border-b border-gray-300">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($tareas->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                        No hay tareas registradas.
                                    </td>
                                </tr>
                            @else
                                @foreach($tareas as $tarea)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $tarea->id }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $tarea->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">
                                            {{ $tarea->descripcion ?? 'Sin descripción' }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $tarea->fecha ?? 'No asignada' }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">
                                            <a href="{{ route('tareas.show', $tarea->id) }}"
                                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                               Ver
                                            </a>
                                            @if(auth()->user()->rol === 'administrador')
                                                <a href="{{ route('tareas.edit', $tarea->id) }}"
                                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm ml-2">
                                                   Editar
                                                </a>
                                                <form action="{{ route('tareas.destroy', $tarea->id) }}"
                                                      method="POST" class="inline ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm"
                                                            onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endif
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
