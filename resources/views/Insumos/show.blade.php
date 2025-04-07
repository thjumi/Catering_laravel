<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Insumo - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdfcf8;
            font-family: 'Segoe UI', sans-serif;
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
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom">
        <h2 class="mb-4 title-gold">Detalles del Insumo</h2>

        <p><strong>ID:</strong> {{ $insumo->id }}</p>
        <p><strong>Nombre:</strong> {{ $insumo->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $insumo->descripcion ?? 'Sin descripción' }}</p>
        <p><strong>Evento Asociado:</strong>
            @if ($insumo->evento)
                {{ $insumo->evento->nombre }}
            @else
                <span class="text-muted">Sin evento asignado</span>
            @endif
        </p>

        <a href="{{ route('insumos.index') }}" class="btn btn-gold mt-4">← Volver al listado</a>
    </div>
</div>

</body>
</html>

