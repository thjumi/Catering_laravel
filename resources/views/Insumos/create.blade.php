<<<<<<< Updated upstream
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
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Insumo - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdfcf8;
        }
        .card-custom {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            padding: 30px;
        }
        .title-gold {
            color: #d4af37;
            font-weight: bold;
        }
        .btn-gold {
            background-color: #d4af37;
            color: white;
            border: none;
        }
        .btn-gold:hover {
            background-color: #b9972e;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom">
        <h2 class="mb-4 title-gold">Crear Insumo</h2>

        <form action="{{ route('insumos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" class="form-control" name="stock" id="stock">
            </div>

            <div class="mb-3">
                <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                <select class="form-select" name="disponibilidad" id="disponibilidad">
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tipoInsumo" class="form-label">Tipo de Insumo:</label>
                <input type="text" class="form-control" name="tipoInsumo" id="tipoInsumo" required>
            </div>

            <div class="mb-3">
                <label for="lugarAlmacen" class="form-label">Lugar de Almacenamiento:</label>
                <input type="text" class="form-control" name="lugarAlmacen" id="lugarAlmacen" required>
            </div>

            <div class="mb-4">
                <label for="evento_id" class="form-label">Asignar a Evento:</label>
                <select class="form-select" name="evento_id" id="evento_id">
                    <option value="">-- Selecciona un evento --</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-gold px-4 py-2">Crear Insumo</button>
            </div>
        </form>
>>>>>>> Stashed changes
    </div>
</div>

</body>
</html>
