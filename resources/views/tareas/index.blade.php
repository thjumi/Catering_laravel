<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-indigo-600 leading-tight flex items-center">
            <svg class="h-6 w-6 text-indigo-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-6.938 4h13.856C19.816 19.698 21 17.66 21 15.5S19.816 11.302 17.344 11H6.656C4.184 11 3 13.038 3 15.5s1.184 4.198 3.656 4.5z" />
            </svg>
            {{ __('Listado de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-b from-gray-100 to-white shadow sm:rounded-lg p-6">
                <!-- Opcional: Botón para crear tarea -->
                <div class="mb-4 text-right">
                    <a href="{{ route('tareas.create') }}" class="px-6 py-3 bg-green-600 text-white font-medium text-lg rounded hover:bg-green-700">
                        + Crear Nueva Tarea
                    </a>
                </div>

                <!-- Tabla de listado de tareas -->
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Fecha de Tarea</th>
                            <th class="px-4 py-2">Empleado</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-gray-50">
                        @forelse($tareas as $tarea)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 text-gray-800">{{ $tarea->nombre }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $tarea->descripcion }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ $tarea->fechaTarea }}</td>
                                <td class="px-4 py-2 text-gray-600">{{ $tarea->empleado->name ?? 'No asignado' }}</td>
                                <td class="px-4 py-2">
                                    @if($tarea->estado == 'Pendiente')
                                        <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded">Pendiente</span>
                                    @elseif($tarea->estado == 'En Proceso')
                                        <span class="px-2 py-1 bg-blue-200 text-blue-800 rounded">En Proceso</span>
                                    @elseif($tarea->estado == 'Completada')
                                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded">Completada</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded">Sin definir</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('tareas.edit', $tarea->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                        Editar
                                    </a>
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                        Ver
                                    </a>
                                    <a href="{{ route('tareas.delete', $tarea->id) }}" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                        Eliminar
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
