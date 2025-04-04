<x-app-layout>
    <x-slot name="header">
        <!-- Encabezado con fondo degradado y logo -->
        <div class="relative bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded shadow">
            <h2 class="font-semibold text-xl text-white leading-tight text-center">
                {{ __('Gestión de Inventario') }}
            </h2>
            <!-- Logo en la esquina superior derecha -->
            <div class="absolute top-0 right-0 mt-2 mr-2">
                <img src="/path-to-your-logo/logo.png" alt="Logo de la Empresa" class="h-12 w-auto rounded-md shadow-lg">
            </div>
        </div>
    </x-slot>

    <div class="py-6 bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Lista de Insumos</h3>

                    <!-- Tabla de Insumos -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-success">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($insumos as $insumo)
                                <tr>
                                    <td class="text-center">{{ $insumo->id }}</td>
                                    <td>{{ $insumo->nombre }}</td>
                                    <td class="text-center">{{ $insumo->cantidad }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Botón para crear nuevo insumo -->
                    <div class="text-center mt-6">
                        <a href="{{ route('insumos.create') }}" class="btn btn-primary py-2 px-4">
                            Crear nuevo insumo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
