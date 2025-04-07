<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f5f0;
            font-family: 'Poppins', sans-serif;
            color: #333;
            padding: 2rem;
        }
        .container-custom {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #026b29;
            margin-bottom: 1.5rem;
        }
        p {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        a.btn-volver {
            display: inline-block;
            background-color: #84b200;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <h1>Detalles del Empleado</h1>

        <p><strong>ID:</strong> {{ $empleado->id }}</p>
        <p><strong>Nombre:</strong> {{ $empleado->name }}</p>
        <p><strong>Email:</strong> {{ $empleado->email }}</p>
        <p><strong>Rol:</strong> {{ $empleado->role }}</p>
        <p><strong>Subrol:</strong> {{ $empleado->subrole ?? 'Sin subrol' }}</p>

        <a href="{{ route('empleados.index') }}" class="btn-volver">Volver al listado</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
