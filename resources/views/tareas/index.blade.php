<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f5f0;
            font-family: 'Poppins', sans-serif;
        }

        .gold-title {
            color: #d4af37;
        }

        .gold-button {
            background-color: #d4af37;
            color: black;
        }

        .gold-button:hover {
            background-color: #c9a634;
            color: black;
        }

        .badge-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-proceso {
            background-color: #cce5ff;
            color: #004085;
        }

        .badge-completada {
            background-color: #d4edda;
            color: #155724;
        }

        .table thead {
            background-color: #f1e9da;
        }

        .card-custom {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="gold-title fw-bold m-0 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-exclamation-circle me-2" viewBox="0 0 16 16">
                    <path d="M7.001 4a.905.905 0 1 1 1.998 0l-.35 4.9a.55.55 0 0 1-1.098 0L7 4zM8 13a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z"/>
                </svg>
                Listado de Tareas
            </h2>
            <a href="{{ route('tareas.create') }}" class="btn gold-button fw-semibold">
                + Crear Nueva Tarea
            </a>
            <a href="{{ route('dashboard.admin') }}" class="btn btn-success ms-auto">Volver a el Dashboard</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="text-center text-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Tarea</th>
                        <th>Empleado</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->fechaTarea }}</td>
                            <td>{{ $tarea->empleado->name ?? 'No asignado' }}</td>
                            <td class="text-center">
                                @if($tarea->estado == 'Pendiente')
                                    <span class="badge badge-pendiente px-3 py-2 rounded-pill">Pendiente</span>
                                @elseif($tarea->estado == 'En Proceso')
                                    <span class="badge badge-proceso px-3 py-2 rounded-pill">En Proceso</span>
                                @elseif($tarea->estado == 'Completada')
                                    <span class="badge badge-completada px-3 py-2 rounded-pill">Completada</span>
                                @else
                                    <span class="badge bg-secondary">Sin definir</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                                <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-primary btn-sm me-1">Ver</a>
                                <a href="{{ route('tareas.delete', $tarea->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No hay tareas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
