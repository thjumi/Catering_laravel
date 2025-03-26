<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.empleados.create') }}" class="btn btn-primary">Añadir Empleado</a>
                    <table class="w-full mt-6 border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">Nombre</th>
                                <th class="border border-gray-300 p-2">Email</th>
                                <th class="border border-gray-300 p-2">Rol</th>
                                <th class="border border-gray-300 p-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $empleado->name }}</td>
                                <td class="border border-gray-300 p-2">{{ $empleado->email }}</td>
                                <td class="border border-gray-300 p-2">{{ $empleado->role }}</td>
                                <td class="border border-gray-300 p-2">
                                    <a href="{{ route('admin.empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('admin.empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
