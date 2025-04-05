<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f5f0;
            color: #333;
            font-family: 'Poppins', sans-serif;
        }

        h1.text-center {
            font-size: 2rem;
            color: #026b29;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .bg-green-300 {
            background: #fff !important;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .btn-success {
            background-color: #84b200;
            border: none;
            transition: all 0.2s ease;
            font-weight: 600;
        }

        .btn-success:hover {
            background-color: #b9972d;
            transform: scale(1.03);
        }

        .btn-warning {
            background-color: #f5f0da;
            color: #d4af37;
            border: none;
        }

        .btn-warning:hover {
            background-color: #d4af37;
            color: #fff;
        }

        .btn-danger {
            background-color: #c9302c;
            border: none;
        }

        .btn-danger:hover {
            background-color: #a12020;
        }

        .table {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .table th {
            background: #f5f0da;
            color: #d4af37;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .alert-success {
            background-color: #f5f0da !important;
            color: #026b29 !important;
            border-radius: 8px;
        }

        .pagination {
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            color: #026b29;
            background-color: #f5f0da;
            border: none;
            margin: 0 3px;
            border-radius: 5px;
            padding: 5px 10px;
            transition: all 0.2s ease;
        }

        .pagination .page-link:hover {
            background-color: #026b29;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="bg-green-300 mx-auto" style="max-width: 1200px;">
            <h1 class="text-center">Gestión de Empleados</h1>

            <!-- Filtros -->
            <form method="GET" action="{{ route('empleados.index') }}" class="mb-3">
                <div class="row g-3 align-items-center">
                    <!-- Filtrar por nombre -->
                    <div class="col-auto">
                        <label for="nombre" class="col-form-label fw-bold">Filtrar por nombre:</label>
                    </div>
                    <div class="col-auto">
                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control"
                            placeholder="Juan"
                            value="{{ request('nombre') }}">
                    </div>


                    <!-- Filtrar por subrol -->
                    <div class="col-auto">
                        <label for="subrol" class="col-form-label fw-bold">Filtrar por subrol:</label>
                    </div>
                    <div class="col-auto">
                        <select name="subrol" id="subrol" class="form-control">
                            <option value="">-- Seleccione --</option>
                            <option value="chef" {{ request('subrol') == 'chef' ? 'selected' : '' }}>Chef</option>
                            <option value="mesero" {{ request('subrol') == 'mesero' ? 'selected' : '' }}>Mesero</option>
                            <option value="decorador" {{ request('subrol') == 'decorador' ? 'selected' : '' }}>Decorador</option>
                        </select>
                    </div>

                    <!-- Botón Filtrar -->
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>

               
                    @if(request('nombre') || request('rol') || request('subrol'))
                    <div class="col-auto">
                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Limpiar</a>
                    </div>
                    @endif

                    <!-- Botones a la derecha: Añadir Empleado y Volver al Dashboard -->
                    <div class="col-auto ms-auto">
                        <a href="{{ route('empleados.create') }}" class="btn btn-success">Añadir Empleado</a>
                        <a href="{{ route('dashboard.admin') }}" class="btn btn-success ms-auto">Volver a el Dashboard</a>

                </div>
            </form>

            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>SubRol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->name }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->role }}</td>
                        <td>{{ $empleado->subrole ?? '—' }}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Desea eliminar este empleado?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay empleados registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


            <!-- Paginación -->
            @if($empleados->hasPages())
            <div class="mt-3">
                {{ $empleados->links() }}
            </div>
            @endif

            <!-- Mensaje de éxito -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
