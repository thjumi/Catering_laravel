<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('eventos.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Añadir Evento</a>

                    <table class="w-full mt-6 border border-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr class="text-left text-gray-700 dark:text-gray-300">
                                <th class="px-4 py-2 border-b border-gray-300">Nombre</th>
                                <th class="px-4 py-2 border-b border-gray-300">Fecha</th>
                                <th class="px-4 py-2 border-b border-gray-300">Horario</th>
                                <th class="px-4 py-2 border-b border-gray-300">Empleado Asignado</th>
                                <th class="px-4 py-2 border-b border-gray-300">Descripción</th>
                                <th class="px-4 py-2 border-b border-gray-300">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($eventos->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                                        No hay eventos registrados.
                                    </td>
                                </tr>
                            @else
                                @foreach($eventos as $evento)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $evento->nombre }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $evento->fecha }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $evento->horario }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">
                                            {{ $evento->empleado?->name ?? 'No asignado' }}
                                        </td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">{{ $evento->descripcion }}</td>
                                        <td class="px-4 py-2 border-b text-white border-gray-300">
                                            <!-- Botón Ver Detalles -->
                                            <a href="{{ route('eventos.show', $evento->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Ver Detalles</a>

                                            <!-- Botón Editar -->
                                            <a href="{{ route('eventos.edit', $evento->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Editar</a>

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">Eliminar</button>
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
