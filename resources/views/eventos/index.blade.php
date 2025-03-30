<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('eventos.create') }}" class="btn btn-primary">Añadir Evento</a>
                    
                    <table class="w-full mt-6 border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">Nombre</th>
                                <th class="border border-gray-300 p-2">Fecha</th>
                                <th class="border border-gray-300 p-2">Descripción</th>
                                <th class="border border-gray-300 p-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($eventos->isEmpty())
                                <tr>
                                    <td colspan="4" class="border border-gray-300 p-2 text-center">
                                        No hay eventos registrados.
                                        <br>
                                        <a href="{{ route('eventos.create') }}" class="btn btn-primary mt-2">Crear Nuevo Evento</a>
                                    </td>
                                </tr>
                            @else
                                @foreach($eventos as $evento)
                                    <tr>
                                        <td class="border border-gray-300 p-2">{{ $evento->nombre }}</td>
                                        <td class="border border-gray-300 p-2">{{ $evento->fecha }}</td>
                                        <td class="border border-gray-300 p-2">{{ $evento->descripcion }}</td>
                                        <td class="border border-gray-300 p-2">
                                            <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar</a>
                                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
