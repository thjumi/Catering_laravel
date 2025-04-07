<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Eventos - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
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
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
        }

        .table th {
            background-color: #f1f1f1;
        }

        .btn-gold {
            background-color: #d4af37;
            color: white;
        }

        .btn-gold:hover {
            background-color: #c1992e;
        }

        .form-control {
            max-width: 300px;
        }
    </style>

</head>
<body>

<div class="container py-5">
    <div class="card card-custom p-4">
        <h2 class="gold-title fw-bold mb-4">Gestión de Eventos</h2>

        <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
   
            <div>
                <label for="fecha" class="form-label mb-0">Filtrar por fecha:</label>
                <input type="date" id="fecha" onchange="cargarEventos()" class="form-control">
            </div>

            <!-- Filtro por invitados -->
            <form method="GET" action="{{ route('eventos.index') }}" class="d-flex align-items-end gap-2">
                <div>
                    <label for="num_invitados" class="form-label mb-0">Filtrar por invitados:</label>
                    <input type="number" name="num_invitados" id="num_invitados" min="10" max="1000"
                           value="{{ request('num_invitados') }}" class="form-control" placeholder="100">
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <!-- Filtro por empleado -->
            <form method="GET" action="{{ route('eventos.index') }}" class="d-flex align-items-end gap-2">
                <div>
                    <label for="empleado_id" class="form-label mb-0">Filtrar por empleado:</label>
                    <select name="empleado_id" id="empleado_id" class="form-select">
                        <option value="">-- Selecciona --</option>
                        @forelse ($empleados as $empleado)
                            <option value="{{ $empleado->id }}" {{ request('empleado_id') == $empleado->id ? 'selected' : '' }}>
                                {{ $empleado->name }}
                            </option>
                        @empty
                            <option disabled>No hay empleados disponibles</option>
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>

            <a href="{{ route('eventos.create') }}" class="btn btn-success ms-auto">Añadir Evento</a>
            <a href="{{ route('dashboard.admin') }}" class="btn btn-success ms-auto">Volver a el Dashboard</a>
        </div>

        <!-- Tabla de eventos -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Empleado Asignado</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-eventos-body">
                    @forelse($eventos as $evento)
                        <tr>
                            <td>{{ $evento->nombre }}</td>
                            <td>{{ $evento->fecha }}</td>
                            <td>{{ \Carbon\Carbon::parse($evento->horario)->format('h:i A') }}</td>
                            <td>{{ $evento->empleado?->name ?? 'No asignado' }}</td>
                            <td>{{ $evento->descripcion }}</td>
                            <td>
                                <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-sm btn-warning text-white">Ver</a>
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No hay eventos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $eventos->links() }}
        </div>
    </div>
</div>

<script>
    async function cargarEventos() {
        let fecha = document.getElementById('fecha').value;
        if (!fecha) return;

        try {
            let response = await fetch(`/eventos/${fecha},1`);
            let data = await response.json();

            let tbody = document.getElementById('tabla-eventos-body');
            tbody.innerHTML = '';

            if (data.data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No hay eventos para esta fecha.</td></tr>';
                return;
            }

            let rutaShow = "{{ route('eventos.show', 'id') }}";
            let rutaEdit = "{{ route('eventos.edit', 'id') }}";
            let rutaDestroy = "{{ route('eventos.destroy', 'id') }}";

            data.data.forEach(evento => {
                let route = rutaShow.replace('id', evento.id);
                let route2 = rutaEdit.replace('id', evento.id);
                let route3 = rutaDestroy.replace('id', evento.id);

                tbody.innerHTML += `
                    <tr>
                        <td>${evento.nombre}</td>
                        <td>${evento.fecha}</td>
                        <td>${evento.horario}</td>
                        <td>${evento.empleado?.name ?? 'No asignado'}</td>
                        <td>${evento.descripcion}</td>
                        <td>
                            <a href="${route}" class="btn btn-sm btn-warning text-white">Ver</a>
                            <a href="${route2}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="${route3}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
            });
        } catch (error) {
            console.error('Error al cargar eventos:', error);
        }
    }
</script>

</body>
</html>
