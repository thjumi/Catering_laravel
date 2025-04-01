<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Insumos') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Lista de Insumos</h3>
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->id }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td>{{ $insumo->cantidad }}</td>
                                <td>
                                    <a href="{{ route('insumos.edit', $insumo) }}" class="text-blue-500">Editar</a>
                                    <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('insumos.create') }}" class="block bg-blue-500 text-white text-center mt-4 py-2 rounded-lg">
                        Crear nuevo insumo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
