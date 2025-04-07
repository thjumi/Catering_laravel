<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
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
            text-align: center;
        }

        .container {
            max-width: 900px;
            margin: 3rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            color: #d4af37;
            margin-top: 1rem;
            display: block;
        }

        input[type="text"],
        select {
            border: 1px solid #d4af37;
            border-radius: 8px;
            padding: 10px;
            font-size: 1rem;
            width: 100%;
            margin-top: 0.5rem;
            background-color: #f5f0da;
        }

        .text-danger {
            color: #c9302c;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .btn-success {
            background-color: #84b200;
            color: #fff;
            font-weight: 600;
            padding: 10px 15px;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            border: none;
            margin-top: 1.5rem;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #b9972d;
            transform: scale(1.03);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Editar Empleado</h1>

        <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $empleado->name }}" required>
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="rol">Rol:</label>
            <select class="form-select" name="rol" id="rol" required>
                <option value="empleado" {{ $empleado->rol === 'empleado' ? 'selected' : '' }}>Empleado</option>
            </select>
            @error('rol')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="subrol">Subrol:</label>
            <input type="text" class="form-control" name="subrol" id="subrol" value="{{ $empleado->subrole }}" {{ $empleado->role !== 'empleado' ? 'disabled' : '' }}>
            @error('subrol')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <br>
            <button class="btn-success" type="submit">Actualizar</button>
        </form>
    </div>

</body>
</html>
