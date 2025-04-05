<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Evento - Catering Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7f5f0;
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
            background-color: #c49d2c;
        }

        .form-container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow-lg p-4 form-container mx-auto">
            <h1 class="text-center gold-title mb-4 fw-bold">Crear Evento</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('eventos.store') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label fw-semibold">Nombre del Evento:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del evento"
                        class="form-control" required>
                </div>

                <!-- Fecha -->
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-semibold">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <!-- Horario -->
                <div class="mb-3">
                    <label for="horario" class="form-label fw-semibold">Horario:</label>
                    <input type="time" name="horario" id="horario" class="form-control" required>
                </div>

                <!-- Número de Invitados -->
                <div class="mb-3">
                    <label for="num_invitados" class="form-label fw-semibold">Número de Invitados:</label>
                    <input type="number" name="num_invitados" id="num_invitados"
                        placeholder="Ingrese el número de invitados" class="form-control" required>
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-semibold">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4"
                        placeholder="Ingrese una breve descripción del evento" class="form-control"></textarea>
                </div>

                <!-- Asignar Empleado -->
                <div class="mb-4">
                    <label for="usuario_id" class="form-label fw-semibold">Asignar Usuario:</label>
                    <select name="usuario_id" id="usuario_id" class="form-select">
                        <option value="">Seleccione un empleado</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }} (ID: {{ $usuario->id }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botón de Crear -->
                <div class="text-center">
                    <button type="submit" class="btn gold-button px-4 py-2 fw-bold rounded">Crear Evento</button>
                </div>
            </form>

            <!-- Enlace para volver -->
            <div class="text-center mt-4">
                <a href="{{ route('eventos.index') }}" class="text-decoration-none text-gold fw-semibold">← Volver al listado de eventos</a>
            </div>
        </div>
    </div>
</body>
</html>

