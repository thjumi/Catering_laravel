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
    </div>
</div>

</body>
</html>
