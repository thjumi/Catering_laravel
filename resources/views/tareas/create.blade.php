<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Tarea - Catering Soft</title>
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

        .gold-button {
            background-color: #d4af37;
            color: black;
            border: none;
        }

        .gold-button:hover {
            background-color: #caa52f;
        }

        .card-custom {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control, .form-select {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom mx-auto p-5" style="max-width: 700px;">
        <h2 class="text-center mb-4 gold-title fw-bold">Crear Nueva Tarea</h2>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tareas.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre de la Tarea:</label>
                <input type="text" name="nombre" id="nombre" required
                       class="form-control" value="{{ old('nombre') }}">
            </div>

            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Fecha -->
            <div class="mb-4">
                <label for="fechaTarea" class="form-label">Fecha de Tarea:</label>
                <input type="date" name="fechaTarea" id="fechaTarea" required
                       class="form-control" value="{{ old('fechaTarea') }}">
            </div>

            <!-- Asignar Empleado -->
            <div class="mb-4">
                <label for="empleado_id" class="form-label">Asignar a Empleado:</label>
                <select name="empleado_id" id="empleado_id" class="form-select">
                    <option value="">Seleccionar Empleado</option>
                    @foreach($usuarios as $empleado)
                        <option value="{{ $empleado->id }}">{{ $empleado->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Evento -->
            <div class="mb-4">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select name="evento_id" id="evento_id" class="form-select">
                    <option value="">Seleccionar Evento</option>
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Estado -->
            <div class="mb-4">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="Completada">Completada</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn gold-button fw-semibold px-4">
                    Crear Tarea
                </button>
                <a href="{{ route('tareas.index') }}" class="text-decoration-underline text-warning fw-semibold">
                    ← Volver al listado de tareas
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
