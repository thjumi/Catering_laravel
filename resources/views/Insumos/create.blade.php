<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Insumo') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('insumos.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock:</label>
                    <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                <div class="mb-4">
                    <label for="disponibilidad" class="block text-sm font-medium text-gray-700">Disponibilidad:</label>
                    <select name="disponibilidad" id="disponibilidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="tipoInsumo" class="block text-sm font-medium text-gray-700">Tipo de Insumo:</label>
                    <input type="text" name="tipoInsumo" id="tipoInsumo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                <div class="mb-4">
                    <label for="lugarAlmacen" class="block text-sm font-medium text-gray-700">Lugar de Almacenamiento:</label>
                    <input type="text" name="lugarAlmacen" id="lugarAlmacen" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Crear</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
