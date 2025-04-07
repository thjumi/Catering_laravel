<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Tarea - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdfaf5;
            font-family: 'Poppins', sans-serif;
        }

        .card-custom {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }

        .title-gold {
            color: #d4af37;
            font-weight: 700;
        }

        .btn-gold {
            background-color: #d4af37;
            color: #000;
        }

        .btn-gold:hover {
            background-color: #c9a634;
            color: #000;
        }

        .label-bold {
            font-weight: 600;
            color: #444;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom">
        <h2 class="title-gold mb-4">
            Detalles de la Tarea
        </h2>

        <h4 class="mb-3">{{ $tarea->nombre }}</h4>

        <p><span class="label-bold">Descripción:</span> {{ $tarea->descripcion ?? 'No especificada' }}</p>
        <p><span class="label-bold">Fecha de Tarea:</span> {{ $tarea->fechaTarea }}</p>
        <p><span class="label-bold">Empleado:</span> {{ $tarea->empleado->name ?? 'No asignado' }}</p>
        <p><span class="label-bold">Estado:</span> {{ $tarea->estado }}</p>

        <div class="mt-4">
            <a href="{{ route('tareas.index') }}" class="btn btn-gold fw-semibold">
                ← Volver al Listado
            </a>
        </div>
    </div>
</div>

</body>
</html>
