<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Insumos</title>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f5f0;
            font-family: 'Poppins', sans-serif;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            font-size: 2rem;
            color: #026b29;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: #f7f5f0;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: 2rem auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-weight: bold;
            color: #d4af37;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        thead {
            background: #f5f0da;
            color: #d4af37;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #d4af37;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }

        .empty-row {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card card-custom">
            <h2 class="mb-4 title-gold">Editar Insumo</h2>

             {{-- Mostrar mensajes de error --}}
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $insumo->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ old('descripcion', $insumo->descripcion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $insumo->cantidad }}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="{{ $insumo->stock }}">
                </div>

                <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                    <select class="form-select" name="disponibilidad" id="disponibilidad">
                        <option value="1"  {{ $insumo->disponibilidad === '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0"  {{ $insumo->disponibilidad === '0' ? 'selected' : '' }}>No Disponible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipoInsumo" class="form-label">Tipo de Insumo:</label>
                    <input type="text" class="form-control" name="tipoInsumo" id="tipoInsumo" required value="{{ $insumo->tipoInsumo }}">
                </div>

                <div class="mb-3">
                    <label for="lugarAlmacen" class="form-label">Lugar de Almacenamiento:</label>
                    <input type="text" class="form-control" name="lugarAlmacen" id="lugarAlmacen" required value="{{ $insumo->lugarAlmacen }}">
                </div>

                <div class="mb-4">
                    <label for="evento_id" class="form-label">Asignar a Evento:</label>
                    <select class="form-select" name="evento_id" id="evento_id">
                        <option value="">-- Selecciona un evento --</option>
                        @foreach($eventos as $evento)
                            <option value="{{ $evento->id }}">{{ $evento->nombre }}  {{ old('evento_id', $evento->id) == $insumo->evento_id ? 'selected' : '' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-gold px-4 py-2">Editar Insumo</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
