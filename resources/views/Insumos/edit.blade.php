<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="
            text-align: center;
            font-size: 2rem;
            color: #026b29;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;">
            {{ __('Lista de Insumos') }}
        </h2>
    </x-slot>

    <div class="py-12" style="
        background: #f7f5f0;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="
                    font-family: 'Poppins', sans-serif;">
                    <h3 class="text-lg font-semibold" style="
                        font-weight: bold;
                        color: #d4af37;
                        margin-bottom: 1.5rem;">Insumos disponibles</h3>

                    <div class="overflow-x-auto" style="
                        border-radius: 8px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);">
                        <table class="w-full mt-6 border border-gray-300 border-collapse" style="
                            background: #fff;
                            border-radius: 8px;
                            overflow: hidden;">
                            <thead class="bg-gray-100 dark:bg-gray-700" style="
                                background: #f5f0da;
                                color: #d4af37;">
                                <tr class="text-left text-gray-700 dark:text-gray-200">
                                    <th class="px-4 py-2 border-b" style="
                                        font-weight: bold;
                                        text-align: center;">ID</th>
                                    <th class="px-4 py-2 border-b" style="
                                        font-weight: bold;
                                        text-align: center;">Nombre</th>
                                    <th class="px-4 py-2 border-b" style="
                                        font-weight: bold;
                                        text-align: center;">Descripción</th>
                                    <th class="px-4 py-2 border-b" style="
                                        font-weight: bold;
                                        text-align: center;">Cantidad</th>
                                    <th class="px-4 py-2 border-b" style="
                                        font-weight: bold;
                                        text-align: center;">Evento Asociado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($insumos as $insumo)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600" style="
                                        background: #fff;
                                        border-bottom: 1px solid #d4af37;">
                                        <td class="px-4 py-2 border-b" style="
                                            text-align: center;">{{ $insumo->id }}</td>
                                        <td class="px-4 py-2 border-b" style="
                                            text-align: center;">{{ $insumo->nombre }}</td>
                                        <td class="px-4 py-2 border-b" style="
                                            text-align: center;">{{ $insumo->descripcion ?? 'Sin descripción' }}</td>
                                        <td class="px-4 py-2 border-b" style="
                                            text-align: center;">{{ $insumo->cantidad }}</td>
                                        <td class="px-4 py-2 border-b" style="
                                            text-align: center;">{{ optional($insumo->evento)->nombre ?? 'Sin evento' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-gray-500" style="
                                            text-align: center;
                                            font-style: italic;">No hay insumos registrados.</td>
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
