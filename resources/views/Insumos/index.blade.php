<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Insumos - Catering Soft</title>
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

        .table thead {
            background-color: #f8f9fa;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .card-custom {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
        }

        .badge-evento {
            background-color: #d4af37;
            color: #fff;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="card card-custom p-4">
            <h2 class="gold-title fw-bold mb-4">Lista de Insumos</h2>

            <h5 class="mb-3">Insumos disponibles:</h5>
            <a href="{{ route('dashboard.admin') }}" class="btn btn-success ms-auto mb-3">Volver al Dashboard</a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Eventos Asociados</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->id }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td>{{ $insumo->descripcion ?? 'Sin descripción' }}</td>
                                <td>{{ $insumo->cantidad }}</td>
                                <td>
                                    @if($insumo->eventos->isNotEmpty())
                                        @foreach($insumo->eventos as $evento)
                                            <span class="badge badge-evento">
                                                {{ $evento->nombre }} - {{ $evento->pivot->cantidad }} unidad{{ $evento->pivot->cantidad > 1 ? 'es' : '' }}
                                            </span><br>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Sin evento</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No hay insumos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
