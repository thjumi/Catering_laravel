<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea - Catering Soft</title>
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
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card card-custom mx-auto p-5" style="max-width: 700px;">
        <h2 class="text-center mb-4 gold-title fw-bold">Editar Tarea: {{ $tarea->nombre }}</h2>

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

        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                       value="{{ old('nombre', $tarea->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion', $tarea->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fechaTarea" class="form-label">Fecha de Tarea:</label>
                <input type="date" name="fechaTarea" id="fechaTarea" class="form-control"
                       value="{{ old('fechaTarea', $tarea->fechaTarea) }}" required>
            </div>

            <div class="mb-3">
                <label for="empleado_id" class="form-label">Asignar a Empleado:</label>
                <select name="empleado_id" id="empleado_id" class="form-select">
                    <option value="">Seleccionar Empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id }}" @if(old('empleado_id', $tarea->empleado_id) == $empleado->id) selected @endif>
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="evento_id" class="form-label">Seleccionar Evento:</label>
                <select name="evento_id" id="evento_id" class="form-select">
                    @foreach($eventos as $evento)
                        <option value="{{ $evento->id }}" @if(old('evento_id', $tarea->evento_id) == $evento->id) selected @endif>
                            {{ $evento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="Pendiente" {{ old('estado', $tarea->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Proceso" {{ old('estado', $tarea->estado) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="Completada" {{ old('estado', $tarea->estado) == 'Completada' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn gold-button fw-semibold">Actualizar Tarea</button>
            </div>

            <div class="text-center">
                <a href="{{ route('tareas.index') }}" class="text-success text-decoration-underline fw-semibold">← Volver al listado de tareas</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>

