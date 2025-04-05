<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="
            text-align: center;
            font-size: 2rem;
            color: #026b29;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;">
            {{ __('Crear Insumo') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8" style="
        background: #f7f5f0;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('insumos.store') }}" method="POST" style="
                background: #fff;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                font-family: 'Poppins', sans-serif;">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;"></textarea>
                </div>

                <div class="mb-4">
                    <label for="cantidad" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Stock:</label>
                    <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                </div>

                <div class="mb-4">
                    <label for="disponibilidad" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Disponibilidad:</label>
                    <select name="disponibilidad" id="disponibilidad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tipoInsumo" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Tipo de Insumo:</label>
                    <input type="text" name="tipoInsumo" id="tipoInsumo" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                </div>

                <div class="mb-4">
                    <label for="lugarAlmacen" class="block text-sm font-medium text-gray-700" style="
                        font-weight: 600;
                        color: #d4af37;
                        margin-top: 1rem;">Lugar de Almacenamiento:</label>
                    <input type="text" name="lugarAlmacen" id="lugarAlmacen" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" style="
                        border: 1px solid #d4af37;
                        border-radius: 8px;
                        padding: 10px;
                        background-color: #f5f0da;">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700" style="
                        background-color: #84b200;
                        color: #fff;
                        font-weight: 600;
                        padding: 10px 15px;
                        border-radius: 10px;
                        border: none;
                        transition: all 0.2s ease-in-out;">Crear</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
