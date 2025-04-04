<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Insumos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Insumos disponibles</h3>

                    <div class="overflow-x-auto">
                        <table class="w-full mt-6 border border-gray-300 border-collapse">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr class="text-left text-gray-700 dark:text-gray-200">
                                    <th class="px-4 py-2 border-b">ID</th>
                                    <th class="px-4 py-2 border-b">Nombre</th>
                                    <th class="px-4 py-2 border-b">Descripción</th>
                                    <th class="px-4 py-2 border-b">Cantidad</th>
                                    <th class="px-4 py-2 border-b">Evento Asociado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($insumos as $insumo)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2 border-b">{{ $insumo->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $insumo->nombre }}</td>
                                        <td class="px-4 py-2 border-b">{{ $insumo->descripcion ?? 'Sin descripción' }}</td>
                                        <td class="px-4 py-2 border-b">{{ $insumo->cantidad }}</td>
                                        <td class="px-4 py-2 border-b">{{ optional($insumo->evento)->nombre ?? 'Sin evento' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                            No hay insumos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
