<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido Administrador!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Estadísticas del Panel de Administración</h3>

                    <ul class="mt-4">
                        <li>Total de empleados: {{ $totalEmpleados }}</li>
                        <li>Total de eventos: {{ $totalEventos }}</li>
                        <li>Total de tareas: {{ $totalTareas }}</li>
                        <li>Tareas pendientes: {{ $tareasPendientes }}</li>
                    </ul>

                    <div class="mt-6 grid grid-cols-3 gap-6">
                        <a href="{{ route('empleados.index') }}"
                            class="block p-6 bg-blue-500 text-white rounded-lg text-center">Gestionar Empleados</a>
                        <a href="{{ route('eventos.index') }}"
                            class="block p-6 bg-green-500 text-white rounded-lg text-center">Gestionar Eventos</a>
                        <a href="{{ route('tareas.index') }}"
                            class="block p-6 bg-yellow-500 text-white rounded-lg text-center">Gestionar Tareas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
