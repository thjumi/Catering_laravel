<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Evento - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9f6f0;
            font-family: 'Poppins', sans-serif;
        }

        .gold-title {
            color: #d4af37;
        }

        .card-custom {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .label {
            font-weight: 600;
            color: #333;
        }

        .value {
            font-size: 1.05rem;
            color: #555;
        }

        .link-volver {
            color: #28a745;
            text-decoration: underline;
            font-weight: 500;
        }

        .link-volver:hover {
            color: #218838;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom mx-auto p-5" style="max-width: 600px;">
        <h2 class="text-center mb-4 gold-title fw-bold">Detalles del Evento</h2>

        <div class="mb-3">
            <div class="label">Nombre del Evento:</div>
            <div class="value">{{ $evento->nombre }}</div>
        </div>

        <div class="mb-3">
            <div class="label">Fecha:</div>
            <div class="value">{{ $evento->fecha }}</div>
        </div>

        <div class="mb-3">
            <div class="label">Horario:</div>
            <div class="value">{{ $evento->horario }}</div>
        </div>

        <div class="mb-3">
            <div class="label">Empleado Asignado:</div>
            <div class="value">{{ $evento->empleado?->name ?? 'No asignado' }}</div>
        </div>

        <div class="mb-3">
            <div class="label">Descripción:</div>
            <div class="value">{{ $evento->descripcion }}</div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('eventos.index') }}" class="link-volver">← Volver al listado de eventos</a>
        </div>
    </div>
</div>

</body>
</html>

