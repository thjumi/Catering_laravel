<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h2 class="font-semibold text-xl text-white bg-gradient-to-r from-blue-500 to-indigo-600 p-4 rounded-lg shadow-md leading-tight text-center">
                {{ __('Bienvenido Administrador!') }}
            </h2>
            <!-- Logo en la esquina superior derecha -->
            <div class="absolute top-0 right-0 mt-2 mr-2">
                <img src="/path-to-your-logo/logo.png" alt="Logo de la Empresa" class="h-12 w-auto rounded-md shadow-lg">
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">
                        Estadísticas del Panel de Administración
                    </h3>

                    <!-- Estadísticas con diseño en tarjetas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="p-6 bg-blue-50 rounded-lg shadow text-center">
                            <h4 class="text-xl font-semibold text-blue-500">Total de empleados</h4>
                            <p class="text-lg font-bold">{{ $totalEmpleados }}</p>
                        </div>
                        <div class="p-6 bg-green-50 rounded-lg shadow text-center">
                            <h4 class="text-xl font-semibold text-green-500">Total de eventos</h4>
                            <p class="text-lg font-bold">{{ $totalEventos }}</p>
                        </div>
                        <div class="p-6 bg-yellow-50 rounded-lg shadow text-center">
                            <h4 class="text-xl font-semibold text-yellow-500">Total de tareas</h4>
                            <p class="text-lg font-bold">{{ $totalTareas }}</p>
                        </div>
                        <div class="p-6 bg-red-50 rounded-lg shadow text-center">
                            <h4 class="text-xl font-semibold text-red-500">Tareas pendientes</h4>
                            <p class="text-lg font-bold">{{ $tareasPendientes }}</p>
                        </div>
                        <div class="p-6 bg-gray-50 rounded-lg shadow text-center">
                            <h4 class="text-xl font-semibold text-gray-500">Total de insumos</h4>
                            <p class="text-lg font-bold">{{ $totalInsumos }}</p>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <a href="{{ route('empleados.index') }}"
                           class="block p-6 bg-blue-500 text-white rounded-lg text-center shadow-md hover:bg-blue-600 transition-all transform hover:scale-105">
                            Gestionar Empleados
                        </a>
                        <a href="{{ route('eventos.index') }}"
                           class="block p-6 bg-green-500 text-white rounded-lg text-center shadow-md hover:bg-green-600 transition-all transform hover:scale-105">
                            Gestionar Eventos
                        </a>
                        <a href="{{ route('tareas.index') }}"
                           class="block p-6 bg-yellow-500 text-white rounded-lg text-center shadow-md hover:bg-yellow-600 transition-all transform hover:scale-105">
                            Gestionar Tareas
                        </a>
                        <a href="{{ route('insumos.index') }}"
                           class="block p-6 bg-red-500 text-white rounded-lg text-center shadow-md hover:bg-red-600 transition-all transform hover:scale-105">
                            Ver Insumos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
