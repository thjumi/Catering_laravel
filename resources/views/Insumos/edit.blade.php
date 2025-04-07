<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Insumos</title>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            font-size: 2.2rem;
            color: #2e7d32;
            margin-bottom: 1.5rem;
        }

        .container {
            background: #ffffff;
            padding: 3rem;
            border-radius: 16px;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-weight: 600;
            color: #fbc02d;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
            color: #333;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4caf50;
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .mb-3,
        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .text-end {
            text-align: right;
        }

        .btn {
            background-color: #fbc02d;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #f9a825;
        }

        .alert {
            padding: 1rem;
            background-color: #ffcdd2;
            color: #c62828;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .alert ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        select option[selected] {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-custom">
            <h2>Editar Insumo</h2>

            {{-- Mostrar mensajes de error --}}
            @if ($errors->any())
                <div class="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $insumo->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{ old('descripcion', $insumo->descripcion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $insumo->cantidad }}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="{{ $insumo->stock }}">
                </div>

                <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                    <select class="form-select" name="disponibilidad" id="disponibilidad">
                        <option value="1"  {{ $insumo->disponibilidad === '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0"  {{ $insumo->disponibilidad === '0' ? 'selected' : '' }}>No Disponible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipoInsumo" class="form-label">Tipo de Insumo:</label>
                    <input type="text" class="form-control" name="tipoInsumo" id="tipoInsumo" required value="{{ $insumo->tipoInsumo }}">
                </div>

                <div class="mb-3">
                    <label for="lugarAlmacen" class="form-label">Lugar de Almacenamiento:</label>
                    <input type="text" class="form-control" name="lugarAlmacen" id="lugarAlmacen" required value="{{ $insumo->lugarAlmacen }}">
                </div>

                <div class="mb-4">
                    <label for="evento_id" class="form-label">Asignar a Evento:</label>
                    <select class="form-select" name="evento_id" id="evento_id">
                        <option value="">-- Selecciona un evento --</option>
                        @foreach($eventos as $evento)
                            <option value="{{ $evento->id }}" {{ old('evento_id', $evento->id) == $insumo->evento_id ? 'selected' : '' }}>
                                {{ $evento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn">Editar Insumo</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
