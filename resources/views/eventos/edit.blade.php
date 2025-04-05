<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento - Catering Soft</title>
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
    <div class="card card-custom mx-auto p-5" style="max-width: 600px;">
        <h2 class="text-center mb-4 gold-title fw-bold">Editar Evento</h2>

        {{-- Mostrar mensajes de error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Evento:</label>
                <input type="text" name="nombre" id="nombre"
                       class="form-control"
                       value="{{ old('nombre', $evento->nombre) }}" required minlength="10" maxlength="40">
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" name="fecha" id="fecha"
                       class="form-control"
                       value="{{ old('fecha', $evento->fecha) }}" required>
            </div>

            <!-- Horario -->
            <div class="mb-3">
                <label for="horario" class="form-label">Horario:</label>
                <input type="time" name="horario" id="horario"
                       class="form-control"
                       value="{{ old('horario', $evento->horario) }}" required>
            </div>

            <!-- Número de Invitados -->
            <div class="mb-3">
                <label for="num_invitados" class="form-label">Número de Invitados:</label>
                <input type="number" name="num_invitados" id="num_invitados"
                       class="form-control"
                       value="{{ old('num_invitados', $evento->num_invitados) }}" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                          class="form-control" required>{{ old('descripcion', $evento->descripcion) }}</textarea>
            </div>

            <!-- Asignar Empleado -->
            <div class="mb-4">
                <label for="usuario_id" class="form-label">Asignar Empleado:</label>
                <select name="usuario_id" id="usuario_id" class="form-select">
                    <option value="">Seleccione un empleado</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ old('usuario_id', $evento->empleado_id) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->name }} (ID: {{ $usuario->id }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de Guardar -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn gold-button fw-semibold">Actualizar Evento</button>
            </div>

            <!-- Volver -->
            <div class="text-center">
                <a href="{{ route('eventos.index') }}" class="text-decoration-underline text-success fw-semibold">← Volver al listado de eventos</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
